<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'user_addresses';
    protected $fillable = [
        'user_id',
        'address1',
        'address2',
        'suburb',
        'state',
        'postcode',
        'country',
    ];
}
