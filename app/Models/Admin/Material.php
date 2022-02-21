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
        'diploma_id'
    ];

    public function material()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
}
