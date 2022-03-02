<?php

namespace App\Models;

use App\Models\Admin\Group;
use App\Models\Admin\Session;
use App\Models\Admin\SessionAttendance;
use App\Models\Admin\SolvedTask;
use App\Models\Admin\Task;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'diploma_id',
        'client_id',
        'group_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function solved_tasks()
    {
        return $this->hasMany(SolvedTask::class, 'user_id' , 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }
    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id' , 'id');
    }
    public function task()
    {
        return $this->hasMany(Task::class, 'task_id' , 'id');
    }
    public function session()
    {
        return $this->belongsTo(Session::class, 'student_id' , 'id');
    }
}
