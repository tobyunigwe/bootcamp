<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(UpdateUserRequest $request, $user)
    {
        if (!$request->validated()) {
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $user = User::find($user);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if (!empty($request['password'])) {
            $user->password = Hash::make($request['password']);
        }
        $user->save();
        return redirect()->route('profile.index', $user->id)->withErrors(['succes' => 'The changes are saved! 😃']);
    }
}
