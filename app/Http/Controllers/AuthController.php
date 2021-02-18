<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User, App\Profile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    /**
     * Registro de usuario
     */
    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nickName' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'firstName' => 'required|string',
            'secondName' => 'required|string',
            'genre' => 'required',
        ]);

        //Validamos la petición
        if ($validator->fails()) {
            return response()->json([
                'message' => "Error en validaciones",
                "body" => $validator->errors()
            ], 400);
        } // if

        // Creamos un usuario
        $user = new User();
        $user->name = $request->nickName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Creamos un perfil para asociarlo al usuario
        $profile = new Profile();
        $profile->first_name = $request->firstName;
        $profile->second_name = $request->secondName;
        $profile->genre = $request->genre;

        $user->profile()->save($profile);

        return response()->json([
            'body' => $user,
            'message' => 'Successfully created user!'
        ], 201);
    } // SingUp

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);


        if ($validate->fails()) {
            return response()->json([
                'message' => "Error en validaciones",
                "body" => $validate->errors()
            ], 400);
        } // if

        $credentials = request(['email','password']);

         // Validamos al usuario a aautenticarse
        if(!Auth::attempt($credentials)) return response()->json(["message" => "Bad Credentials"],401);
        
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if($request->remember_me){
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
        }
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]); 
    } //login

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            "message" => 'session die'
        ]);
    } // logout

    /*
        * Obtener el objeto User como json
     */
    public function user(Request $request)
    {
        $user = Auth::user();
        if (!is_null($user)) {
            return response()->json(["message" => "success", "body" => $user],201);
        } else {
            return response()->json(["message" => "failed", "body" => "Whoops! no user found"],400);
        }
    }
}// class  