<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SigninController extends Controller
{
    public function signin(Request $request)
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

        if($validator->fails()) return response()->json([
            "error" => true,
            "title" => "signin",
            "message" => $validator->errors()->first(),
        ]);

        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password, "activated"=>1,"blocked"=>0])){
            $user = User::find(Auth::id());
            //$token = $user->createToken('PersonalAccessToken')->accessToken;
            return response()->json([
                "error" => false,
                "title" => "signin",
                "message" => "done",
            ]);
        } else {
            return response()->json([
                "error" => true,
                "title" => "signin",
                "message" => "Email ou mot de passe incorrect",
            ]);
        }

        
    }
}
