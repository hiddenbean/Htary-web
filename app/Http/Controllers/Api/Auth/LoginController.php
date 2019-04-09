<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Get the all user informations
     * 
     * @param Request $request
     * @return User 
     */
    public function login(Request $request)
    {
        return response(auth()->user());
    }
}
