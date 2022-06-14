<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;
use Cookie;

class AuthController extends Controller
{
    //

    public function token(Request $request)
    {
        if (! Auth::guard('cguard')->attempt($request->only('email', 'password')))
        {
            return response()
                ->json([
                    'success'=>false,
                    'message'=>'Хэрэглэгчийн нэр эсвэл нууц үг буруу байна'
                ], 400);
        }

        // return $request->user();

        // $customer = Customer::where('email', $request['email'])->first();

        $token = Auth::guard('cguard')->user()->createToken('frontend')->plainTextToken;

        // $cookie = Cookie::make('beauty_user', json_encode($customer, JSON_UNESCAPED_UNICODE), 120, null, null, false, false);
        // $token = Cookie::make('beauty_token', $token, 120, null, null, false, true);
        

        return response()
            ->json([
                'customer' => Auth::guard('cguard')->user(),
                'token' => $token
            ]);
            // ->withCookie($cookie)
            // ->withCookie($token);

    }

    public function logout(Request $request)
    {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];

    }

}
