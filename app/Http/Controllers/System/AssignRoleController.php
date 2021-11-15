<?php

namespace App\Http\Controllers\System;

use App\Models\User;
use App\Models\Roles;
use App\Models\Thirds;
use App\Models\Clients;
use App\Models\Contacts;
use App\Models\Teachers;
use App\Models\UserRole;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AssignRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('email','!=','admin@gmail.com')->get();
        return view("system.assign-role.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::where('name','!=','superadmin')->get();
        return view("system.assign-role.create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->has('is_client') && !$request->has('is_employee') && !$request->has('is_teacher') ) {
            Session::flash('error', 'Vous devez selectioné le type d\'utilisateur');
            return redirect()->back()->withInput();
        }
        $validator = Validator::make($request->all(),
        [
            "firstname" => "bail|required",
            "lastname" => "bail|required",
            "email" => "bail|required|email",
            "phone" => "bail|required",
            "password" => "bail|required|min:6",
        ],
        [
            "firstname.required" => "prénom requis",
            "lastname.required" => "nom requis",
            "email.required" => "email requis",
            "email.email" => "email mauvais format",
            "phone.required" => "numéro requis",
            "password.required" => "mot de passe requis",
            "password.min" => "mot de passe :min requis",
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        if($request->password != $request->confPassword){
            Session::flash('error', 'les mots de passe ne sont pas égaux');
            return redirect()->back()->withInput();
        }

        if(!$request->has('assignRole')){
            Session::flash('error', 'Vous devez assigner un rôle pour cet utilisateur');
            return redirect()->back()->withInput();
        }

        try {
            $user = new User();
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->activated = $request->activated;
            $user->blocked = $request->blocked;
            $user->save();
        } catch(QueryException $qe){
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        if($request->has('is_client')){
            try {
                $contacts = new Contacts();
                $contacts->users_id = $user->id;
                $contacts->categories_type_id = 2;
                $contacts->first_name = $request->firstname;
                $contacts->last_name = $request->lastname;
                $contacts->code_client = 'C'.rand(0,9999).'_'.rand(0,99999);
                $contacts->code_supplier = 'L'.rand(0,9999).'_'.rand(0,99999);
                $contacts->phone = $request->phone;
                $contacts->email = $request->email;
                $contacts->gender = $request->gender;
                $contacts->birthday = $request->birthday;
                $contacts->address_line = $request->address;
                $contacts->city = $request->city;
                $contacts->zip_code = $request->zip_code;
                $contacts->country = $request->country;
                $contacts->save();
            } catch (QueryException $qe) {
                Session::flash('error', $qe->getMessage());
                return redirect()->back()->withInput();
            }
        }

        if($request->has('is_employee') || $request->has('is_teacher')){
            try {
                $employee = new Employees();
                $employee->users_id = $user->id;
                $employee->first_name = $request->firstname;
                $employee->last_name = $request->lastname;
                $employee->email = $request->email;
                $employee->phone = $request->phone;
                $employee->gender = $request->gender;
                $employee->birthday = $request->birthday;
                $employee->address_line = $request->address;
                $employee->city = $request->city;
                $employee->zip_code = $request->zip_code;
                $employee->country = $request->country;
                $employee->save();
                if($request->has('is_teacher')){
                    try {
                        $teacher = new Teachers();
                        $teacher->employees_id = $employee->id;
                        $teacher->save();
                    } catch (QueryException $qe) {
                        Session::flash('error', $qe->getMessage());
                        return redirect()->back()->withInput();
                    }
                }
            } catch (QueryException $qe) {
                Session::flash('error', $qe->getMessage());
                return redirect()->back()->withInput();
            }
        }

        try {
            $userRole = new UserRole();
            $userRole->users_id = $user->id;
            $userRole->roles_id = $request->assignRole;
            $userRole->save();
        } catch(QueryException $qe){
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        Session::flash('success', "Utilisateur créer avec succés");
        return redirect()->route('system-assign-role');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Roles::where('name','!=','superadmin')->get();
        return view('system.assign-role.edit',['user'=>$user,"roles"=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            "firstname" => "bail|required",
            "lastname" => "bail|required",
            "email" => "bail|required|email",
            "phone" => "bail|required",
        ],
        [
            "firstname.required" => "prénom requis",
            "lastname.required" => "nom requis",
            "email.required" => "email requis",
            "email.email" => "email mauvais format",
            "phone.required" => "numéro requis",
        ]);

        if($validator->fails()){
            Session::flash('error', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        try{
            User::where('id',$id)->update([
                'email' => $request->email,
                'phone' => $request->phone,
                'activated' => $request->activated,
                'blocked' => $request->blocked,
            ]);
            if($request->has('assignRole')){
                try {
                    UserRole::where('users_id',$id)->update([
                        'roles_id' => $request->assignRole,
                    ]);
                } catch (QueryException $qe) {
                    Session::flash('error', $qe->getMessage());
                    return redirect()->back()->withInput();
                }
            }
            
        }catch(QueryException $qe){
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }

        if($request->has('is_client')){
            try {
                Contacts::where('id',Contacts::where('users_id',$id)->pluck('id')->first())->update([
                    'first_name' => $request->firstname,
                    'last_name' => $request->lastname,
                    'code_client' => 'C'.rand(0,9999).'_'.rand(0,99999),
                    'code_supplier' => 'L'.rand(0,9999).'_'.rand(0,99999),
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'birthday' => $request->birthday,
                    'address_line' => $request->address,
                    'city' => $request->city,
                    'zip_code' => $request->zip_code,
                    'country' => $request->country,
                ]);
            } catch (QueryException $qe) {
                Session::flash('error', $qe->getMessage());
                return redirect()->back()->withInput();
            }
        }

        if($request->has('is_employee') || $request->has('is_teacher')){
            try {
                Employees::where('id',Employees::where('users_id',$id)->pluck('id')->first())->update([
                    'first_name' => $request->firstname,
                    'last_name' => $request->lastname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                    'birthday' => $request->birthday,
                    'address_line' => $request->address,
                    'city' => $request->city,
                    'zip_code' => $request->zip_code,
                    'country' => $request->country,
                ]);
            } catch (QueryException $qe) {
                Session::flash('error', $qe->getMessage());
                return redirect()->back()->withInput();
            }
        }

        Session::flash('success', "Utilisateur modifier avec succés");
            return redirect()->route('system-assign-role');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        try {
            if($user->contact){
                Contacts::where('users_id',$id)->update(['users_id'=>null]);
            }            
            if($user->employee){
                Employees::where('users_id',$id)->update(['users_id'=>null]);
            }
            if($user->userRole){
                User::find($id)->userRole->delete();
            }          
            User::find($id)->delete();
            Session::flash('success', "Utilisateur supprimer avec succés");
            return redirect()->route('system-assign-role');
        } catch (QueryException $qe) {
            Session::flash('error', $qe->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
