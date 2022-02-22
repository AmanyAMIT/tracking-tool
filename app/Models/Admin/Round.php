<?php

namespace App\Models\Admin;

use App\Models\Client;
use App\Models\Diploma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    protected $fillable = [
        'round_no',
        'group_id',
        'diploma_id',
        'client_id'
    ];


    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id' , 'id');
    }
    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id' , 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id' , 'id');
    }
}
