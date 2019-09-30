<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class House
 * @package App
 */
class House extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages'
    ];
}
