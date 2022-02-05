<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\State;
use App\Models\Address;
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
        return view('clients.create', ['states' => $states]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( AddressRequest $addressRequest, ClientRequest $clientRequest)
    {
        try {
            $address = Address::create($addressRequest->all());
            $client = new Client($clientRequest->all());
            $client->address_id = $address->id;
            $client->save();
            return redirect()->route('clients.index');
            session()->flash('message', 'Cliente adicionado com sucesso');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao inserir cliente. Tente novamente: {{$e->message}}.');
            return redirect()->route('clients.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
