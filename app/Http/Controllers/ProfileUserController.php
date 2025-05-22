<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileUser;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function show($id)
    {
        $profile = ProfileUser::where('user_id', $id)->firstOrFail();
        return view('profile.show', compact('profile'));
    }
}
