<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Permission;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userPermissions = User_Permission::orderBy('id')->get();
        $userId = Auth::user()->id;

        $permissionUserId = User_Permission::where('user_id', '=', $userId)->get();
        $permissionAdministrator = $permissionUserId->where('permission_id', '=', '1');


        if (count($permissionAdministrator) > 0) {
            $users = User::orderBy('id');

        if ($request->name) {
            $users->where('name', 'like', "%$request->name%");
        }

        $users = $users->simplePaginate(10);

        return view('users.index', ['users' => $users]);
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
        return view('users.create');
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
    public function edit( User $user)
    {
        return view('users.edit', ['user' => $user]);
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
        $input = $request->all();

        $users = User::find($id);

        if (! Hash::check($input['actual_password'], Auth::user()->password)) {
            session()->flash('error', 'Erro ao atualizar usuário.');
            return redirect()->route('users.index');
        }
        else {
            $validation = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'actual_password' => 'required|min:8',
            ]);

            $users->name = $input['name'];
            $users->email = $input['email'];

            if (isset($input['password'])) {

                $validation_password = $request->validate([
                    'password' => 'required|min:8|confirmed',
                    'password_confirmation' => 'required|min:8'
                ]);

                $input['password'] = Hash::make($input['password']);
                $users->password = $input['password'];
            }

            $users->save();


            session()->flash('message', 'Usuário atualizado com sucesso.');
            return redirect()->route('users.index');

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        session()->flash('message', 'Usuário excluído com sucesso');
        return redirect()->route('users.index');
    }
}