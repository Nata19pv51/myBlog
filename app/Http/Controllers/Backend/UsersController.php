<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend;

class UsersController extends Controller
{
    public function create()
    {
        $roles = \App\Role::pluck('title', 'id');

        return view('Backend.users.create')->with('roles', $roles);
    }

    public function store(StoreUsersRequest $request)
    {

        $user = User::create($request->all());

        $user->roles()->sync($request->input('role_list'), false);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        $roles = \App\Role::pluck('title', 'id');
        return view('Backend.users.edit', compact('user'))->with('roles', $roles);

    }

    public function update(UpdateUsersRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->roles()->sync($request->input('role_list'));

        return redirect()->route('users.index');
    }




}
