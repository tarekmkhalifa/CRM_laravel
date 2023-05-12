<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(8);
        return view('Admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('Admin.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        // request validation ==> UserStoreRequest

        // prepare data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // store data
        User::create($data);
        $msg = "User added successfully";
        return redirect()->back()->with('success', $msg);
    }

    public function edit(User $user)
    {
        if ($user->id !== Auth::user()->id) {
            return redirect()->back();
        }
        return view('Admin.users.edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        // request validation ==> UserUpdateRequest

        // if want to update password
        $password = auth()->user()->password; // old password

        if ($request->password) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        
        // prepare data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ];
       

        // update in db
        $user->update($data);

        $msg = "Profile updated successfully";
        return redirect()->back()->with('success', $msg);
    }
}
