<?php

namespace App\Models\Admin;

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

    public function solved_tasks()
    {
        return $this->belongsTo(SolvedTask::class, 'task_id' , 'id');
    }
}
