<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraising extends Model
{
    protected $table = 'fundraisings';

    protected $fillable = [
        'name',
        'co',
        'address',
        'addressline',
        'city',
        'state',
        'zipcode',
        'phone',
    ];
}
