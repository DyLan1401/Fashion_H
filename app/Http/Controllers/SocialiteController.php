<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User; // Model User
use Illuminate\Support\Facades\Auth; // Facade Auth
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class SocialiteController extends Controller
{
    /**
     * Chuyển hướng người dùng đến trang đăng nhập của nhà cung cấp
     */
    public function authProviderRedirect($provider)
    {
        if ($provider) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }

    /**
     * Xử lý callback từ nhà cung cấp đăng nhập
     */
    public function socialAuthentication($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            
            if (!$socialUser->getEmail()) {
                return redirect()->route('login')->with('error', 'Không thể lấy email từ tài khoản ' . $provider);
            }

            $user = User::where('auth_provider_id', $socialUser->id)
                       ->orWhere('email', $socialUser->getEmail())
                       ->first();

            if (!$user) {
                $user = User::create([
                    'name' => $socialUser->getName() ?? 'Unknown',
                    'email' => $socialUser->getEmail(),
                    'auth_provider_id' => $socialUser->getId(),
                    'auth_provider' => $provider,
                    'password' => bcrypt(Str::random(16)),
                ]);
            } else {
                // Update provider info if user exists but logged in with different provider
                $user->update([
                    'auth_provider_id' => $socialUser->getId(),
                    'auth_provider' => $provider,
                ]);
            }

            Auth::login($user, true); // true để "remember me"
            
            return redirect()->intended(route('home'));
            
        } catch (Exception $e) {
            return redirect()->route('login')
                           ->with('error', 'Đăng nhập thất bại: ' . $e->getMessage());
        }
    }
}
