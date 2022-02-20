<?php

namespace App\Models;

use App\Models\Admin\TaskCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Diploma extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }

    public function taskcategories()
    {
        return $this->hasMany(TaskCategory::class, 'diploma_id' , 'id');
    }
}
