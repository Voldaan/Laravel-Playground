<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarV2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand',
        'bodytype',
        'doors',
        'engine_id'
    ];
}
