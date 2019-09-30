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

    /**
     * @param $query
     * @param $bedrooms
     * @return mixed
     */
    public function scopeByBedrooms($query, $bedrooms)
    {
        if ($bedrooms) {

            $query->where('bedrooms', $bedrooms);
        }

        return $query;
    }

    /**
     * @param $query
     * @param $bathrooms
     * @return mixed
     */
    public function scopeByBathrooms($query, $bathrooms)
    {
        if ($bathrooms) {

            $query->where('bathrooms', $bathrooms);
        }

        return $query;
    }

    /**
     * @param $query
     * @param $storeys
     * @return mixed
     */
    public function scopeByStoreys($query, $storeys)
    {
        if ($storeys) {

            $query->where('storeys', $storeys);
        }

        return $query;
    }

    /**
     * @param $query
     * @param $garages
     * @return mixed
     */
    public function scopeByGarages($query, $garages)
    {
        if ($garages) {

            $query->where('garages', $garages);
        }

        return $query;
    }
}
