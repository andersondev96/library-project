<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Book;
use App\Models\User;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loans = Loan::orderBy('loan_date');

        if ($request->name) {
            $loans->where('name', 'like', "%$request->name%")
                ->join('clients', 'clients.id', '=', 'client_id');
        }

        $loans= $loans->simplePaginate(10);

        $clients = Client::orderBy('id')->get();
        $books = Book::orderBy('id')->get();

        return view('loans.index', ['loans' => $loans, 'clients' => $clients, 'books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderBy('id')->get();
        $books = Book::orderBy('id')->get();

        return view('loans.create', ['clients' => $clients, 'books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
         try {
            $loan = Loan::create([
                'client_id' => $request->client_id,
                'books_id' => $request->books_id,
                'loan_date' => date('Y-m-d'),
                'delivery_date' => $request->delivery_date,
                'attendent_id' => Auth::user()->id,
            ]);

            $loan->save();
            return redirect()->route('loans.index');
            session()->flash('message', 'Empréstimo realizado com sucesso!');
         } catch (\Exception $e) {
            session()->flash('error', 'Erro ao realizar o empréstimo!');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return view('loans.show', ['loan' => $loan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        return view('loans.edit', ['loan' => $loan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //$loanId = Loan::find($loan->id);

        $loan->fill($request->all());
        $loan->save();
        session()->flash('message', 'Empréstimo atualizado com sucesso');
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        session()->flash('message', 'Empréstimo excluído com sucesso');
        return redirect()->route('loans.index');
    }
}
