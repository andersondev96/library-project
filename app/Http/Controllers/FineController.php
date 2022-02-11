<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;

class FineController extends Controller
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

        $fines = $clients->where('traffic_ticket', '>', 0);

        $fines= $fines->simplePaginate(10);

        return view('fines.index', ['fines' => $fines]);
    }

    public function show(Client $client) {

    }

    public function payment(Client $client) {
        $client->traffic_ticket = 0;
        $client->save();
        return redirect()->route('fines.index');
        session()->flash('message', 'Multa paga com sucesso');
    }
}
