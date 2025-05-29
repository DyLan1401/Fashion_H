<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{
    /**
     * Login page
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        Log::info('Login attempt:', ['email' => $request->email]);
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Log::info('User authenticated:', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
                'role_type' => gettype($user->role)
            ]);
            
            if (strtolower($user->role) === 'admin') {
                Log::info('Admin login successful, redirecting to dashboard');
                return redirect()->route('admin.dashboard');
            }
            
            Log::info('Regular user login successful, redirecting to home');
            return redirect()->route('home');
        }

        Log::warning('Login failed:', ['email' => $request->email]);
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }

    /**
     * Registration page
     */
    public function createUser(): View
    {
        return view('auth.create');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request): View
    {
        $user = User::findOrFail($request->id);
        return view('auth.read', ['user' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request): RedirectResponse
    {
        User::destroy($request->id);
        return redirect()->route('user.list')->with('success', 'Xóa người dùng thành công!');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request): View
    {
        $user = User::findOrFail($request->id);
        return view('auth.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'required|min:6',
            'phone' => 'required',
        ]);

        $user = User::findOrFail($request->id);
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address
        ])->save();

        return redirect()->route('home')->with('success', 'Cập nhật thành công!');
    }

    /**
     * List of users
     */
    public function listUser(): View
    {
        $users = User::all();
        return view('auth.list', compact('users'));
    }

    /**
     * Sign out
     */
    public function signOut(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * User profile page
     */
    public function profile(): View
    {
        return view('profile.index', ['user' => Auth::user()]);
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'required_with:new_password|current_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ])->save();

        if ($request->filled('new_password')) {
            $user->fill(['password' => Hash::make($request->new_password)])->save();
        }

        return redirect()->route('user.profile')
                        ->with('success', 'Thông tin đã được cập nhật thành công!');
    }

    /**
     * Forgot password form
     */
    public function forgotPasswordForm(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Process forgot password request
     */
    public function forgotPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)
                   ->where('name', $request->name)
                   ->first();

        if (!$user) {
            return back()->with('error', 'Không tìm thấy tài khoản với thông tin đã cung cấp.');
        }

        $newPassword = Str::random(8);
        $user->fill(['password' => Hash::make($newPassword)])->save();

        try {
            Mail::send('emails.reset-password', ['password' => $newPassword], function($message) use ($user) {
                $message->to($user->email)
                        ->subject('Mật khẩu mới của bạn');
            });
            return back()->with('success', 'Mật khẩu mới đã được gửi đến email của bạn.');
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            return back()->with('error', 'Không thể gửi email. Vui lòng thử lại sau.');
        }
    }
}
