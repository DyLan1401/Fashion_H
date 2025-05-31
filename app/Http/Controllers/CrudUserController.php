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
use Illuminate\Support\Facades\DB;

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
            'name' => [
                'required',
                'regex:/^[\p{L}]+( [\p{L}]+)*$/u',
                new \App\Rules\NoLeadingOrTrailingSpaces
            ],
            'password' => [
                'required',
                'min:6',
                'max:16',
                new \App\Rules\NoLeadingOrTrailingSpaces
            ],
            'phone' => [
                'required',
                'min:10',
                'max:12',
                new \App\Rules\NoLeadingOrTrailingSpaces
            ],
            'address' => [
                'required',
                'string',
                'max:255',
                new \App\Rules\NoLeadingOrTrailingSpaces
            ]
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
            'name' => [
                'required',
                'regex:/^[\p{L}]+(?: [\p{L}]+)*$/u',
                new \App\Rules\NoLeadingOrTrailingSpaces
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $request->id, // ⚠️ sửa 'emal' thành 'email'
                new \App\Rules\NoLeadingOrTrailingSpaces
            ],
            'password' => [
                'required',
                'min:6',
                'max:16',
                new \App\Rules\NoLeadingOrTrailingSpaces
            ],
            'phone' => [
                'required',
                'min:10',
                'max:12',
                new \App\Rules\NoLeadingOrTrailingSpaces
            ]
        ]);

        $user = User::findOrFail($request->id);
        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ];

        if ($request->filled('new_password')) {
            $updateData['password'] = Hash::make($request->new_password);
        }

        DB::table('users')->where('id', $user->id)->update($updateData);

        return redirect()->route('home')->with('success', 'Cập nhật thành công!');
    }

    /**
     * List of users
     */
    public function listUser(): View
    {
        $users = User::all();
        return view('admin.manageUser', compact('users'));
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
            'name' => ['required', 'regex:/^[\pL\s]+$/u', new \App\Rules\NoLeadingOrTrailingSpaces],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'min:10', 'max:12'],
            'address' => ['nullable'],
            'current_password' => ['required_with:new_password', 'current_password'],
            'new_password' => ['nullable', 'min:6', 'confirmed'],
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ];

        if ($request->filled('new_password')) {
            $updateData['password'] = Hash::make($request->new_password);
        }

        DB::table('users')->where('id', $user->id)->update($updateData);

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
            ['name' => 'required|regex:/^[\pL\s]+$/u ', new \App\Rules\NoLeadingOrTrailingSpaces],

            ['email' => 'required|email ', new \App\Rules\NoLeadingOrTrailingSpaces]
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
            Mail::send('emails.reset-password', ['password' => $newPassword], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Mật khẩu mới của bạn');
            });
            return back()->with('success', 'Mật khẩu mới đã được gửi đến email của bạn.');
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            return back()->with('error', 'Không thể gửi email. Vui lòng thử lại sau.');
        }
    }

    /**
     * Store new user
     */
    public function storeUser(Request $request): RedirectResponse
    {
        try {
            $request->validate([
                'name' => [
                    'required',
                    'regex:/^[\p{L}]+( [\p{L}]+)*$/u',
                    new \App\Rules\NoLeadingOrTrailingSpaces
                ],
                'email' => [
                    'required',
                    'email',
                    'unique:users',
                    new \App\Rules\NoLeadingOrTrailingSpaces
                ],
                'password' => [
                    'required',
                    'min:6',
                    'max:16',
                    new \App\Rules\NoLeadingOrTrailingSpaces
                ],
                'phone' => [
                    'required',
                    'min:10',
                    'max:12',
                    new \App\Rules\NoLeadingOrTrailingSpaces
                ],
                'address' => [
                    'required',
                    'string',
                    'max:255',
                    new \App\Rules\NoLeadingOrTrailingSpaces
                ],
                'role' => [
                    'required',
                    'in:admin,user'
                ]
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'role' => $request->role
            ]);

            if (!$user) {
                throw new \Exception('Không thể tạo người dùng mới');
            }

            return redirect()->route('admin.users.list')
                ->with('success', 'Thêm người dùng thành công!');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Lỗi khi thêm người dùng: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra khi thêm người dùng. Vui lòng thử lại.');
        }
    }

    /**
     * Show create user form
     */
    public function showCreateForm(): View
    {
        return view('auth.create');
    }
}
