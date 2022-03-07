<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\State;
use App\Models\Address;
use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::orderBy('id');

        if ($request->name) {
            $clients->where('name', 'like', "%$request->name%");
        }

        $clients = $clients->simplePaginate(10);

        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::orderBy('initials')->get();
        $types = ['Aluno', 'Professor', 'Funcionário', 'Comunidade'];
        $departments = ['DCEX', 'DCHM', 'DCNN', 'DCBL', 'DCTL', 'Não se aplica'];
        return view('clients.create', ['states' => $states, 'types' => $types, 'departments' => $departments]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ClientRequest $clientRequest)
    {
        try {
            $address = Address::create($clientRequest->all());
            $client = new Client($clientRequest->all());
            $client->address_id = $address->id;
            $client->save();
            session()->flash('message', 'Cliente adicionado com sucesso');
            return redirect()->route('clients.index');
        } catch (Exception $e) {
            session()->flash('error', 'Erro ao realizar o cadastro.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $states = State::orderBy('initials')->get();
        return view('clients.edit', ['client' => $client, 'states' => $states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

        $address = Address::find($client->address_id);
        $address->fill($request->all());
        $address->save();

        $client->fill($request->all());
        $client->save();

        session()->flash('message', 'Cliente atualizado com sucesso');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $loan = Loan::where('client_id', '=', $client->id)->get();
        if (count($loan) > 0) {
            session()->flash('error', 'Não é possível excluir o cliente. Há empréstimos associados a ele.');
        } else {
            $id = $client->address_id;
            $address = Address::find($id);
            $address->delete();
            $client->delete();
            session()->flash('message', 'Cliente excluído com sucesso');
        }

        return redirect()->route('clients.index');

    }
}