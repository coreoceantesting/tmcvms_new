<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('password.change')->with(['error' => 'The current password is incorrect.']);
        }

        // Update the password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Redirect with a success message
        return redirect()->route('password.change')->with('success', 'Password changed successfully.');
    }
}
