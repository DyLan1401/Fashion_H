<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
    

    /**
     * Registration page
     */
    public function createUser()
    {
        return view('auth.create');
    }
 
    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect("login");
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('auth.read', ['messi' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('auth.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
        ]);

       $user = User::find($input['id']);
       $user->name = $input['name'];
       $user->email = $input['email'];
       $user->password = Hash::make($input['password']);
       $user->save();

        return redirect('/')->withSuccess('Cập nhật thành công');
    }

    /**
     * List of users
     */
    public function listUser()
    {
//       // Lấy tất cả người dùng từ bảng users
        $users = User::all();

        // Truyền dữ liệu vào view
        return view('auth.list', compact('users'));
    }

    
   
    /**
     * Sign out
     */
    public function signOut() {
        \Illuminate\Support\Facades\Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::id());
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'required_with:new_password|current_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('new_password')) {
            $user->password = bcrypt($request->new_password);
        }

        $user->save();

        return redirect()->route('user.profile')
                        ->with('success', 'Thông tin đã được cập nhật thành công!');
    }

    public function forgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
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
        $user->password = Hash::make($newPassword);
        $user->save();

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