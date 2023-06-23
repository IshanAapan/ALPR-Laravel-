<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Vehicle extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable=[
        'user_id',
        'location_id',
        'balance',
        'tag_id',
        'tag_image',
        'region',
        'make',
        'color',
        'vehicle_type',
        'raw_data',
    ];
}
