<?php

namespace Modules\SkyTours\Models\Transformers;

use App\Contracts\Resource;

/**
 * Class PirepResource
 * @package Modules\SkyTours\Models\Transformers
 */
class PirepResource extends Resource
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
            'callsing' => $this->flight_number,
            'dpt_airport' => $this->dpt_airport_id,
            'arr_airport_id' => $this->dpt_airport_id,
        ];
    }
}
