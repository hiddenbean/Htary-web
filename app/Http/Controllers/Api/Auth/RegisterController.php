<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /**
     * Validate a register request
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator($request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Store user account from an api request
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) 
    {
        self::validator($request);

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'api_token' => hash('sha256', Str::random(60)),
        ]);
        
        return response($user, 201);
    }
}
