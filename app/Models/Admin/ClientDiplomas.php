<?php

namespace App\Models\Admin;

use App\Models\Client;
use App\Models\Diploma;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDiplomas extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'diploma_id',
    ];

    public function diplomas()
    {
        return $this->hasMany(Diploma::class, 'diploma_id' , 'id');
    }
    public function clients()
    {
        return $this->hasMany(Client::class, 'diploma_id' , 'id');
    }
}