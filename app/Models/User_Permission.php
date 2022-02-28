<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Permission extends Model
{
    protected $fillable = ['user_id', 'permission_id'];
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function permissions() {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}