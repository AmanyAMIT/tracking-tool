<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolvedTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
        'status',
        'comments'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
}
