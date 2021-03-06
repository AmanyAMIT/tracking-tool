<?php

namespace App\Models;

use App\Models\Admin\ClientDiplomas;
use App\Models\Admin\Group;
use App\Models\Admin\Round;
use App\Models\Admin\Session;
use App\Models\Admin\SolvedTask;
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
        'password'
    ];

    public function diplomas()
    {
        return $this->hasMany(Diploma::class, 'diploma_id' , 'id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'client_id' , 'id');
    }

    public function solvedTasks()
    {
        return $this->hasMany(SolvedTask::class, 'client_id' , 'id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'client_id' , 'id');
    }
    public function students()
    {
        return $this->hasMany(User::class, 'client_id' , 'id');
    }
    public function sessions()
    {
        return $this->hasMany(Session::class, 'client_id' , 'id');
    }
}
