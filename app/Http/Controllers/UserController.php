<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function profile() {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function changePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng!']);
        }
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', 'Đổi mật khẩu thành công!');
    }
} 