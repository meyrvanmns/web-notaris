<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // Tambahkan ini jika nama tabel di database bukan 'clients'
    protected $table = 'clients'; 

    protected $fillable = [
        'name',
        'identity_number',
        'address',
        'phone',
        'email',
        'status',
    ];
}