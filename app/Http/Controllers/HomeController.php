<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    public function attachUserRole($user_id, $role_id)
    {
        $user = User::find($user_id);
        $role = Role::find($role_id);
        $user->roles()->attach($role);
        return $user;
    }

    public function getUserRole($user_id)
    {
        return User::find($user_id)->roles()->get();
    }

    public function attachPermissionRole(Request $request)
    {
        $parameters = $request->only('permission','role');

        $permissionParam = $parameters['permission'];
        $roleParam = $parameters['role'];

        $permission = Permission::find($permissionParam);
        $role = Role::find($roleParam);

        $permission->roles()->attach($role);

        return $this->response->array($role->perms()->get());
    }

    public function test($id)
    {
        $user = User::find($id);
        $roles = $user->roles()->get();

        $permissions = array(sizeof($roles));
        $i = 0;

        foreach ($roles as $role)
        {
            $permissions[$i] = $role->perms()->get();
            $i++;
        }

        return $permissions;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
