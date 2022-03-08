<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_Permission;
use App\Helpers\Helper;
use App\Http\Requests\UserRequest;


use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        if (Helper::isAdministrator()) {
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
        if (Helper::isAdministrator()) {
            return view('users.create');
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
    public function store(UserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $permission = User_Permission::create([
            'user_id' => $user->id,
            'permission_id' => 2,
        ]);

        event(new Registered($user));
        $permission->save();

        session()->flash('message', 'Usuário adicionado com sucesso');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (Helper::isAdministrator()) {
            $permissions = User_Permission::orderBy('id')->get();
            return view('users.show', ['user' => $user, 'permissions' => $permissions]);
        } else {
            session()->flash('error', 'Você não tem permissão para acessar esta página.');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if (Helper::isAdministrator() || Auth::user()->id == $user->id) {
            return view('users.edit', ['user' => $user]);
        } else {
            session()->flash('error', 'Você não tem permissão para acessar esta página.');
            return view('dashboard');
        }
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

        if (!Hash::check($input['actual_password'], Auth::user()->password)) {
            session()->flash('error', 'Erro ao atualizar usuário.');
            return redirect()->route('users.index');
        } else {
            $validation = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'actual_password' => 'required|min:8',
            ]);

            $users->name = $input['name'];
            $users->email = $input['email'];


            if ($request->hasFile('image') && $request->file('image')->isValid()) {


                if (isset($users->image)) {
                    File::delete(public_path('/images' . '/' . 'uploads' . '/' . $users->image));
                }

                $requestImage = $request->image;
                $extension = $requestImage->extension();

                $imgName = md5($requestImage->getClientOriginalName() . strtotime('now')) . "." . $extension;

                $name = $requestImage->move(public_path('images/uploads'), $imgName);

                $users->image = $imgName;
            }

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

        if (isset($user->image)) {

            File::delete(public_path('/images' . '/' . 'uploads' . '/' . $user->image));
        }

        $user->delete();

        session()->flash('message', 'Usuário excluído com sucesso');
        return redirect()->route('users.index');
    }
}