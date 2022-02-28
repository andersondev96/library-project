<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User_Permission;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPermissions = User_Permission::orderBy('id')->get();
        $userId = Auth::user()->id;

       $permissionUserId = User_Permission::where('user_id', '=', $userId)->get();
       $permissionAdministrator = $permissionUserId->where('permission_id', '=', '1');


        if (count($permissionAdministrator) > 0) {
            return view('permissions.index', [ 'userPermissions' => $userPermissions ]);
        } else {
            session()->flash('error', 'Você não tem permissão para acessar esta página.');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id')->get();
        $permissions = Permission::orderBy('id')->get();

        return view('permissions.create', ['users' => $users, 'permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User_Permission::create($request->all());
        session()->flash('message', 'Permissão adicionada com sucesso');
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function show(User_Permission $user_Permission)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Permission $user_Permission)
    {
        $users = User::orderBy('id')->get();
        $permissions = Permission::orderBy('id')->get();

        return view('permissions.edit', ['user_Permission' => $user_Permission, 'users' => $users, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Permission $user_Permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Permission $user_Permission)
    {
        //
    }
}
