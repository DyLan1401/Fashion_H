<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

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
                return redirect()->route('admin.dashboard'); // Sử dụng route name thay vì đường dẫn trực tiếp
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
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

        Log::info('Mail Config:', [
            'MAIL_MAILER' => config('mail.default'),
            'MAIL_HOST' => config('mail.mailers.smtp.host'),
            'MAIL_PORT' => config('mail.mailers.smtp.port'),
            'MAIL_USERNAME' => config('mail.mailers.smtp.username'),
            'MAIL_FROM_ADDRESS' => config('mail.from.address'),
            'MAIL_FROM_NAME' => config('mail.from.name')
        ]);

        try {
            Log::info('Attempting to send email to: ' . $user->email);
            Mail::send('emails.reset-password', ['password' => $newPassword], function($message) use ($user) {
                $message->to($user->email)
                        ->subject('Mật khẩu mới của bạn');
            });
            Log::info('Email sent successfully to: ' . $user->email);
            return back()->with('success', 'Mật khẩu mới đã được gửi đến email của bạn.');
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return back()->with('error', 'Không thể gửi email. Vui lòng thử lại sau.');
        }
    }

    public function signOut() {
        \Illuminate\Support\Facades\Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function createUser()
    {
        return view('auth.create');
    }

    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
             'phone' => $data['phone'],
        'address' => $data['address'] ?? null, 
        ]);
        return redirect('login');
    }

    public function readUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);
        return view('auth.read', ['messi' => $user]);
    }

    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);
        return view('auth.update', ['user' => $user]);
    }

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
        $user->phone = $input['phone'];
        $user->address = $input['address'];
        $user->password = Hash::make($input['password']);
        $user->save();
        return redirect('/')->withSuccess('Cập nhật thành công');
    }
}
