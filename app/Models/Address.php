<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['street', 'number', 'complement', 'district', 'zip_code', 'city', 'state_id'];

    public function state() {
        return $this->belongsTo(State::class);
    }
}
