<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
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
        $loans = Loan::orderBy('return_date', 'ASC')->orderBy('loan_date', 'DESC');

        $loans = $loans
                ->join('books', 'books.id', '=', 'loans.books_id')
                ->join('clients', 'clients.id', '=', 'loans.client_id')
                ->select('loans.*', 'books.title', 'clients.name');

        $clients = Client::orderBy('id')->get();


        if ($request->name) {
            $loans->where('name', 'like', "%$request->name%");
        }

        $loans= $loans->simplePaginate(10);


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
    public function store(LoanRequest $request, User $user)
    {

        $client = Client::find($request->client_id);
        $book = Book::find($request->books_id);

        if (isset($client) && isset($book) && $client->books < 5 && $book->borrowed_amounts < $book->available_quantity - 1) {
            $loan = Loan::create([
                'client_id' => $request->client_id,
                'books_id' => $request->books_id,
                'loan_date' => date('Y-m-d'),
                'delivery_date' => $request->delivery_date,
                'attendent_id' => Auth::user()->id,
            ]);

            $client->increment('books');
            $book->increment('borrowed_amounts');

            $loan->save();
            $client->save();
            $book->save();

            session()->flash('message', 'Empréstimo realizado com sucesso!');
            return redirect()->route('loans.index');
        }
            session()->flash('error', 'Não foi possível realizar o empréstimo, tente novamente!');
            return redirect()->route('loans.create');
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
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function deliver(Loan $loan) {
        $loanDate = \Carbon\Carbon::parse($loan->loan_date);
        $deliveryDate = \Carbon\Carbon::parse($loan->delivery_date);
        $returnDate = isset($loan->return_date) ? $loan->return_date : Date('Y-m-d');
        $diff = \Carbon\Carbon::parse($returnDate)->diffInDays($deliveryDate);
        if ($returnDate > $deliveryDate) {
            $trafficTicket = 1;
            $trafficTicketValue = 2 * $diff;
        } else {
            $trafficTicket = 0;
            $trafficTicketValue = 0;
        }

        return view('loans.deliver', ['loan' => $loan, 'returnDate' => $returnDate, 'trafficTicket' => $trafficTicket, 'trafficTicketValue' => $trafficTicketValue]);

    }

    public function finishDeliver(Request $request, Loan $loan) {

       $client = Client::find($loan->client_id);
       $book = Book::find($loan->books_id);

        $loan->update([
            'return_date' => $request->return_date,
            'traffic_ticket' => substr($request->traffic_ticket, 3),
            'paid' => 0,
        ]);

        $loan->save();

        if (isset($client)) {
            $client->decrement('books');
            $client->increment('traffic_ticket', $loan->traffic_ticket);
            $client->save();
        }

        if (isset($book)) {
            $book->increment('borrowed_amounts');
            $book->save();
        }

        session()->flash('message', 'Devolução realizada com sucesso');
        return redirect()->route('loans.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $clients = Client::orderBy('id')->get();
        $books = Book::orderBy('id')->get();

        return view('loans.edit', ['loan' => $loan, 'clients' => $clients, 'books' => $books]);
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
        $old_client = Client::find($loan->client_id);
        $new_client = Client::find($request->client_id);

        $old_book = Book::find($loan->books_id);
        $new_book = Book::find($request->books_id);

        if(isset($new_client) && isset($new_book) )
            {
                if ($old_client != $new_client && $new_client->books < 5) {
                    $old_client->decrement('books');
                    $new_client->increment('books');
                }

                if ($old_book != $new_book && $new_book->borrowed_amounts < $new_book->available_quantity - 1) {
                    $old_book->decrement('borrowed_amounts');
                    $new_book->increment('borrowed_amounts');
                }

                $loan->fill($request->all());
                $loan->save();
                session()->flash('message', 'Empréstimo atualizado com sucesso');
                return redirect()->route('loans.index');

        } else {
                session()->flash('error', 'Erro ao atualizar o empréstimo');
                return redirect()->route('loans.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $book = Book::find($loan->books_id);
        $client = Client::find($loan->client_id);

        $book->decrement('borrowed_amounts');
        $client->decrement('books');

        $loan->delete();

        session()->flash('message', 'Empréstimo excluído com sucesso');
        return redirect()->route('loans.index');
    }
}