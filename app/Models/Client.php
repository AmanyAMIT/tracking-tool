<?php

namespace App\Models;

use App\Models\Admin\Group;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    public function diplomas()
    {
        return $this->hasMany(Diploma::class, 'diploma_id' , 'id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'client_id' , 'id');
    }
}
