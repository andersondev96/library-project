<?php

namespace App\Livewire\Books;

use App\Models\Book;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $books = Book::paginate(10);

        return view('livewire.books.index', [
            'books' => $books
        ]);
    }
}
