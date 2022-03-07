<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::orderBy('id');

        if ($request->title) {
            $books->where('title', 'like', "%$request->title%");
        }

        $books = $books->simplePaginate(10);

        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        Book::create($request->all());
        session()->flash('message', 'Livro adicionado com sucesso');
        return redirect()->route('books.index');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        if ($request->available_quantity > $book->borrowed_amounts + 1) {
        $book->fill($request->all());
        $book->save();
        session()->flash('message', 'Livro atualizado com sucesso');
        } else {
            session()->flash('error', 'Quantidade de exemplares inválida. Insira uma valor maior do que ' .($book->borrowed_amounts + 1) );
        }
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $loan = Loan::where('books_id', '=', $book->id)->get();
        if (count($loan) > 0 ) {
            session()->flash('error', 'Não é possível excluir o livro. Há empréstimos associados a ele.');
        } else {
            $book->delete();
            session()->flash('message', 'Livro excluido com sucesso');
        }

        return redirect()->route('books.index');


    }
}