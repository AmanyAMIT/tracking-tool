<?php

namespace App\Models\Admin;

use App\Models\Client;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolvedTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
        'task_file',
        'status',
        'score',
        'comments',
        'client_id',
        'diploma_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id' , 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id' , 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }
    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
}
