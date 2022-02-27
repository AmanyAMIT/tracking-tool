<?php

namespace App\Models\Admin;

use App\Models\Client;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'marks',
        'descriptions',
        'requirements',
        'task_category_id',
        'diploma_id',
        'client_id',
    ];

    public function task_category()
    {
        return $this->belongsTo(TaskCategory::class, 'task_category_id' , 'id');
    }

    public function solvedTasks()
    {
        return $this->belongsTo(SolvedTask::class, 'task_id' , 'id');
    }
    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'task_id' , 'id');
    }
}
