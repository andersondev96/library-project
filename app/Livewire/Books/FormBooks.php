<?php

namespace App\Livewire\Books;

use Livewire\Component;

class FormBooks extends Component
{
    public $isbn;
    public $title;
    public $author;
    public $publishing_company;
    public $generous;
    public $synopsis;
    public $publication_place;
    public $publication_date;
    public $publisher_number;
    public $available_quantity;
    public $borrowed_amounts;
    public $pages_number;
    public $language;
    public $target_audience;


    public function render()
    {
        return view('livewire.books.form-books');
    }

    public function store() {

    }
}
