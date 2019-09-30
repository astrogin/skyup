<?php

namespace App\Http\Controllers\Api;

use App\House;
use App\Http\Controllers\Controller;
use App\Http\Resources\HouseResource;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search(Request $request)
    {
        $name = $request->get('name');

        $houses = House::where('name', 'like', "%$name%")
            ->byBedrooms($request->get('bedrooms'))
            ->byBathrooms($request->get('bathrooms'))
            ->byStoreys($request->get('storeys'))
            ->byGarages($request->get('storeys'))
            ->whereBetween('price', $request->get('price'))->get();

        return HouseResource::collection($houses);
    }
}
