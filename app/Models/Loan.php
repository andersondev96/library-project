<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['books_id', 'loan_date', 'delivery_date', 'return_date', 'traffic_ticket', 'paid', 'client_id',  'attendent_id'];

    public function books() {
        return $this->belongsTo(Book::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }
}