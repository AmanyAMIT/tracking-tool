<?php

namespace App\Models\Admin;

use App\Models\Diploma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'diploma_id'
    ];

    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_category_id' , 'id');
    }
    public function materials()
    {
        return $this->hasMany(Material::class, 'category_id' , 'id');
    }
}
