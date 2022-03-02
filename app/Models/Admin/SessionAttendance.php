<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionAttendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_id',
        'student_id',
        'status'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id' , 'id');
    }
    public function students()
    {
        return $this->hasMany(User::class, 'student_id' , 'id');
    }
}
