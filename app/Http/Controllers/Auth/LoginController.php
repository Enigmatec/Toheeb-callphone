<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['bail', 'required', 'min:6', 'max:256'],
            'password' => ['bail', 'required', Password::default()]
        ]);

        try {
            if(! Auth::attempt($credentials)) {
                return Response::unauthenticatedResponse();
            }
            $user = Auth::user();
            $token = $user->createToken($user->username)->plainTextToken;
            return response()->json([
                "success" => true,
                "message" => "Login Successful",
                "token" => $token,
            ]);
        } catch (\Throwable $th) {
            return Response::serverErrorResponse();
        }


    }
}
