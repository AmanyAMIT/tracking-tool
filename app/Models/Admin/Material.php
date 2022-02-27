<?php

namespace App\Models\Admin;

use App\Models\Diploma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'material_docs',
        'diploma_id',
        'category_id'
    ];

    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
    public function category()
    {
        return $this->belongsTo(TaskCategory::class, 'category_id' , 'id');
    }
}
