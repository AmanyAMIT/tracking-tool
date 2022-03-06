<?php

namespace App\Models\Admin;

use App\Models\Client;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'client_id',
        'diploma_id',
        'group_id',
        // 'student_id',
        // 'status'
    ];

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
    public function students()
    {
        return $this->hasMany(User::class, 'student_id' , 'id');
    }
}
