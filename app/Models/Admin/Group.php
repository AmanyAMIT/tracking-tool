<?php

namespace App\Models\Admin;

use App\Models\Client;
use App\Models\Diploma;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_name',
        'client_id',
        'diploma_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }
    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
    public function rounds()
    {
        return $this->hasMany(Round::class, 'group_id' , 'id');
    }
    public function students()
    {
        return $this->hasMany(User::class, 'group_id' , 'id');
    }
}
