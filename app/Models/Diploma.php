<?php

namespace App\Models;

use App\Models\Admin\ClientDiplomas;
use App\Models\Admin\Group;
use App\Models\Admin\Material;
use App\Models\Admin\Round;
use App\Models\Admin\SolvedTask;
use App\Models\Admin\Task;
use App\Models\Admin\TaskCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Diploma extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'hours'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }
    public function clientDiploma()
    {
        return $this->belongsTo(ClientDiplomas::class, 'diploma_id' , 'id');
    }

    public function taskcategories()
    {
        return $this->hasMany(TaskCategory::class, 'diploma_id' , 'id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'diploma_id' , 'id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'diploma_id' , 'id');
    }
    public function solvedTasks()
    {
        return $this->hasMany(SolvedTask::class, 'diploma_id' , 'id');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'diploma_id' , 'id');
    }
    public function students()
    {
        return $this->hasMany(User::class, 'diploma_id' , 'id');
    }
}
