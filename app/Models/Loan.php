<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['books_id', 'loan_date', 'delivery_date', 'client_id', 'attendent_id'];
    public function books() {
        return $this->hasManyThrough(Book::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
