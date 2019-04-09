<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Get the all account informations
     * 
     * @param Request $request
     * @return User 
     */
    public function show(Request $request)
    {
        return response(auth()->user());
    }

    /**
     * Update account informations
     * 
     * @param Request $request
     * @return User
     */
    public function update(Request $request)
    {
        self::validator($request);

        $user = User::findOrFail(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        return response($user);
    }

    /**
     * Validate an update request
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(Request $request) {
        return $request->validate([
            'first_name' => $request->first_name,
            'last_name' =>$request->last_name,
        ]);
    }
}
