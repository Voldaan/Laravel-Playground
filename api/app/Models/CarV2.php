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

    public function getEngine(){
        //Foreign.model, Foreign.id, Model.foreign-key
        return $this->hasOne(Engine::class, 'id', 'engine_id');
    }
}
