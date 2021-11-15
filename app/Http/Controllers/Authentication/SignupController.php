<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignupController extends Controller
{
    public function signup(Request $request)
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
            "termsconditions.accepted" => "vous devez accepter les terms",
        ]);

        if($validator->fails()) return response()->json([
            "error" => true,
            "title" => "signup",
            "message" => $validator->errors()->first(),
        ]);

        if(User::where("email", $request->email)->first()) return response()->json([
            "error" => true,
            "title" => "signup",
            "message" => "Email exist déja",
        ]);

        if(User::where("phone", $request->phone)->first()) return response()->json([
            "error" => true,
            "title" => "signup",
            "message" => "Numéro de téléphone exist déja",
        ]);

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

            return response()->json([
                "error" => false,
                "title" => "signup",
                "message" => "Votre compte est créer",
            ]);

        }catch(QueryException $qe){
            return response()->json([
                "error" => true,
                "title" => "signup",
                "message" => $qe->getMessage(),
            ]);
        }
    }
}
