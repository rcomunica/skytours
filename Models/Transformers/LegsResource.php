<?php

namespace Modules\SkyTours\Models\Transformers;

use App\Contracts\Resource;

/**
 * Class LegsResource
 * @package Modules\SkyTours\Models\Transformers
 */
class LegsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order' => $this->order,
            'departure_airport' => [
                'OACI' => $this->departureAirport->id,
                'latitude' => $this->departureAirport->lat,
                'longitude' => $this->departureAirport->lon,
                'name' => $this->departureAirport->name,
                'description' => $this->departureAirport->description
            ],
            'arrival_airport' => [
                'OACI' => $this->arrivalAirport->id,
                'latitude' => $this->arrivalAirport->lat,
                'longitude' => $this->arrivalAirport->lon,
                'name' => $this->arrivalAirport->name,
                'description' => $this->arrivalAirport->description
            ],
        ];
    }
}
