<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundraising extends Model
{
    protected $table = 'fundraising_check';

    protected $fillable = [
        'name',
        'co',
        'address',
        'addressline',
        'city',
        'state',
        'zip_code',
        'country',
        'phone_number',
        'user_id',
    ];
}
