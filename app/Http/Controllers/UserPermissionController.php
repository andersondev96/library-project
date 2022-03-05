<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

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

        if (Helper::isAdministrator()) {
            $permission = User_Permission::orderBy('id')->get();
            return view('permissions.index', [ 'permission' => $permission ]);
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
        if (Helper::isAdministrator()) {
            $users = User::orderBy('id')->get();
            $permissions = Permission::orderBy('id')->get();

            return view('permissions.create', ['users' => $users, 'permissions' => $permissions]);

        } else {
            session()->flash('error', 'Você não tem permissão para acessar esta página.');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = User_Permission::orderBy('id')->where('user_id', '=', $request->user_id)->get();

        if (count($permissions) == 0) {
            User_Permission::create($request->all());
            session()->flash('message', 'Permissão adicionada com sucesso');
            return redirect()->route('permissions.index');
        } else {
            session()->flash('error', 'Usuário já tem permissões cadastradas.');
            return redirect()->route('permissions.index');
        }
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
     * @param  \App\Models\User_Permission  $userPermissions
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Permission $permission)
    {
        if (Helper::isAdministrator()) {
            $users = User::orderBy('id')->get();
            $permissions = Permission::orderBy('id')->get();
            return view('permissions.edit', ['permission' => $permission, 'users' => $users, 'permissions' => $permissions]);
        }else {
            session()->flash('error', 'Você não tem permissão para acessar esta página.');
            return redirect()->route('dashboard');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Permission $permission)
    {

        $permission->fill($request->all());
        $permission->save();
        session()->flash('message', 'Permissão atualizada com sucesso');
        return redirect()->route('permissions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_Permission  $user_Permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Permission $permission)
    {
        $permission->delete();
        session()->flash('message', 'Permissão excluída com sucesso');
        return redirect()->route('permissions.index');

    }
}