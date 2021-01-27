<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cache;
use jeremykenedy\LaravelRoles\Models\Role;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {

        $user = Auth::user();
        //checking if role of user is admin or teacher
        if ($user->hasRole(['admin', 'teacher'])) {
            $users = User::all();
            $usertype = "Everyone";
            return view('users.index', compact('users', 'usertype'));
        }
        //else send them back to the dashboard
        return redirect()->route('dashboard.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    //method to get an type of user.
    public function show($usertype)
    {
        //get all of the users
        if ($usertype == "everyone") {
            $usertype = "Everyone";
            $users = User::all();
            $errors = null;
            return view('users.index', compact('users', 'usertype'));
        } else {
            $users = Role::where('slug', $usertype)->first()->users()->get();
        }
        return view('users.index', compact('users', 'usertype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (!$request->validated()) {
            return redirect()->back()->withInput($request->input())->withErrors($request);
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return redirect()->route('users.edit', [$user->id])->with(['succes' => 'The changes are saved! 😃']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.show',['everyone'])->withErrors(['succes' => 'User deleted!']);
    }
}


