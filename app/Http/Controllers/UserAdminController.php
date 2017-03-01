<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin-users', ['title' => 'Users', 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastId = ++User::query()->orderBy('id', 'desc')->limit(1)->get(['id'])->pop()->id;
        return view('admin-users-create', ['title' => 'Create user #'.$lastId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|unique:users,email',
            'password' => 'required',
            'is_admin' => 'boolean'
        ]);
        $params = $request->request->all();
        $user = new User($params);
        if ($user->save()) {
            $request->session()->flash('status', 'User #'.$user->id.'created');
            return redirect()->route('user-admin');
        } else {
            return redirect()->route('user-admin.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect()->route('user-admin.edit', ['title' => 'User #'.$user->id, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin-users-edit', ['title' => 'Update user #'.$user->id, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|unique:users,email',
            'password' => 'required',
            'is_admin' => 'boolean'
        ]);
        $params = $request->request->all();
        $user->update($params);
        if ($user->save()) {
            $request->session()->flash('status', 'User created');
            return redirect()->route('user-admin');
        } else {
            return redirect()->route('user-admin.edit', ['user' => $user]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete(); /*?
            $request->session()->flash('status', 'User #'.$user->id.' was removed') :
            $request->session()->flash('status', 'User #'.$user->id.' deletion fault') ;*/
        return redirect()->route('user-admin');
    }
}
