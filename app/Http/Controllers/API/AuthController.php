<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Cookie;

class AuthController extends Controller
{
    //

    public function token(Request $request)
    {
        if (!\Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json([
                    'success'=>false,
                    'message'=>'Хэрэглэгчийн нэр эсвэл нууц үг буруу байна'
                ], 400);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('beautydevelopment')->plainTextToken;
        $user['token'] = $token;

        $cookie = Cookie::make('beauty_user', json_encode($user, JSON_UNESCAPED_UNICODE), 60, null, null, false, false);

        return response()
            ->json($user)
            ->withCookie($cookie);

    }

}
