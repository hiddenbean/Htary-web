<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ApiTokenController extends Controller
{
    /**
     * Update or create api token
     * 
     * @param Integer $user_id
     * @return Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user->email == $request->email && Hash::check($request->password, $user->password))
        {
            $user->api_token = hash('sha256', Str::random(60));
            $user->save();
            
            return response([
                'token' => $user->api_token,
            ]);
        }
        else {
            return response([
                'message' => "login attempt failed",
            ], 400);
        }
    }
}
