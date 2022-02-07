<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['cpf', 'rg', 'name', 'birth_date', 'address_id', 'email', 'telephone', 'type', 'department'];

    public function address() {
        return $this->belongsTo(Address::class);
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }
}
