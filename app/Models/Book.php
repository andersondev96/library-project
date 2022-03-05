<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'title', 'author', 'publishing_company', 'publication_place', 'publication_date', 'publisher_number', 'available_quantity'];

    public function loans() {
        return $this->belongsTo(Loan::class);
    }
}
