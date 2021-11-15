<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    function loginView(){
        return view('Authentication.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            "email" => "bail|required|email",
            "password" => "bail|required|min:6",
        ],
        [
            "email.required" => "email requis",
            "email.email" => "email mauvais format",
            "password.required" => "mot de passe requis",
            "password.min" => "mot de passe :min requis",
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password, "activated"=>1, "blocked"=>0, "archived"=>0])){
            /* return Auth::guard(); */
            //User::find(Auth::id())->createToken('PersonalAccessToken')->accessToken;
            if(Auth::user()->employee){
                if(Auth::user()->employee->teacher){
                    Session::put('user_type', 'enseignant');
                } else {
                    Session::put('user_type', 'employee');
                }
                if (Auth::user()->employee->agency) {
                    Session::put('user_agency_id', Auth::user()->employee->agency->id);
                    Session::put('user_agency_name', Auth::user()->employee->agency->name);
                    if(Auth::user()->employee->department){
                        Session::put('user_department_id', Auth::user()->employee->department->id);
                        Session::put('user_department_name', Auth::user()->employee->department->name);
                    }
                }
            } else if(Auth::user()->contact){
                Session::put('user_type', 'étudiant');
                if (Auth::user()->contact->agency) {
                    Session::put('user_agency_id', Auth::user()->contact->agency->id);
                    Session::put('user_agency_name', Auth::user()->contact->agency->name);
                    if(Auth::user()->contact->department){
                        Session::put('user_department_id', Auth::user()->contact->department->id);
                        Session::put('user_department_name', Auth::user()->contact->department->name);
                    }
                }
            }
            return redirect()->route('dashboard');
        } else {
            Session::flash('error', "Email ou mot de passe incorrect");
            return redirect()->back()->withInput();
        }
    }

    function registrationView(){
        return view('Authentication.registration');

    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            "firstname" => "bail|required",
            "lastname" => "bail|required",
            "email" => "bail|required|email",
            "phone" => "bail|required",
            "password" => "bail|required|min:6",
            "termsconditions" => "required|accepted"
        ],
        [
            "firstname.required" => "prénom requis",
            "lastname.required" => "nom requis",
            "email.required" => "email requis",
            "email.email" => "email mauvais format",
            "phone.required" => "numéro requis",
            "password.required" => "mot de passe requis",
            "password.min" => "mot de passe :min requis",
            "termsconditions.required" => "vous devez accepter les terms et les conditions",
            "termsconditions.accepted" => "vous devez accepter les terms et les conditions",
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        if(User::where("email", $request->email)->first()) {
            Session::flash('error', 'Email exist déja');
            return redirect()->back()->withInput();
        }

        if(User::where("phone", $request->phone)->first()) {
            Session::flash('error', 'Numéro de téléphone exist déja');
            return redirect()->back()->withInput();
        }

        try{
            $user = new User();
            $user->first_name = $request->firstname;
            $user->last_name = $request->lastname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->gender = "Male";
            $user->birthday = "1994-01-08";
            $user->password = Hash::make($request->password);
            $user->save();

            Session::flash('success', "Compte créer avec succés");
            return redirect()->route('login')->withInput(['email'=>$request->email]);

        }catch(QueryException $qe){
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }
    }

    function recoverPasswordView(){
        return view('Authentication.recover-password');
    }

    public function recoverPassword(Request $request)
    {
        
    }

    function confirmEmail(){
        return view('Authentication.confirm-email');
    }

    function lockScreen(){
        return view('Authentication.lock-screen');
    }
}
