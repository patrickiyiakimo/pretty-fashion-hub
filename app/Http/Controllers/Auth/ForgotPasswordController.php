<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('forgot-password');
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $response = Password::sendResetLink($request->only('email'));
        
        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('success', 'Password reset link sent! Check your email.');
        }
        
        return back()->with('error', 'Unable to send reset link. Please try again.');
    }
}