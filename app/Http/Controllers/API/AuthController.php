<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

        return response()
            ->json($user);

    }

}
