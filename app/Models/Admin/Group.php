<?php

namespace App\Models\Admin;

use App\Models\Client;
use App\Models\Diploma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_name',
        'round_no',
        'client_id',
        'diploma_id'
    ];

    public function group()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }
    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
}
