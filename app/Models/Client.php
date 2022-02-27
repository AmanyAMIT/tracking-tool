<?php

namespace App\Models;

use App\Models\Admin\ClientDiplomas;
use App\Models\Admin\Group;
use App\Models\Admin\Round;
use App\Models\Admin\Task;
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

    public function clientDiploma()
    {
        return $this->belongsTo(ClientDiplomas::class, 'client_id' , 'id');
    }
    public function rounds()
    {
        return $this->hasMany(Round::class, 'client_id' , 'id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'client_id' , 'id');
    }
    public function students()
    {
        return $this->hasMany(User::class, 'client_id' , 'id');
    }
}
