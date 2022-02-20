<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'client_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id' , 'id');
    }
}