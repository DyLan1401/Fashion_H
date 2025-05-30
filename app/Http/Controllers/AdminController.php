<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function listUser(Request $request)
    {
        $query = User::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }
        $users = $query->paginate(10)->withQueryString();
        return view('admin.manageUser', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function postUser(Request $request)
    {
        $request->validate([
            ['name' => 'required',
            'regex:/^[\pL\s]+$/u',
             new \App\Rules\NoLeadingOrTrailingSpaces
            ],
            ['email' => 'required
            |email|
            unique:users'
            , new \App\Rules\NoLeadingOrTrailingSpaces
        ],
            ['password' => 'required',
            'min:6',
            'max:16',
             new \App\Rules\NoLeadingOrTrailingSpaces
             ]
        ]);
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'] ?? null,
        ]);
        return redirect()->route('admin.users.list');
    }

    public function readUser($id)
    {
        $user = User::find($id);
        return view('admin.users.show', ['user' => $user]);
    }

    public function updateUser($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function postUpdateUser(Request $request, $id)
    {
        $input = $request->all();
        $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u  ',
            'email' => 'required|email|unique:users,email,  ' . $id,
            'password' => 'required|min:6  ',
        ]);
        $user = User::find($id);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->address = $input['address'];
        $user->password = Hash::make($input['password']);

        $user->save();
        return redirect()->route('admin.users.list');
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.list');
    }
}
