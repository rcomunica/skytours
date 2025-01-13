<?php

namespace Modules\SkyTours\Models;

use App\Contracts\Model;
use App\Models\Airport;

/**
 * Class SkLegs
 * @package Modules\SkyTours\Models
 */
class SkLegs extends Model
{
    public $table = 'sk_legs';
    protected $fillable = [
        'tour_id',
        'departure_airport',
        'arrival_airport',
        'description',
        'order'
    ];

    protected $casts = [];

    public static $rules = [
        'tour_id' => 'required',
        'departure_airport' => 'required',
        'arrival_airport' => 'required',
    ];

    public function tour()
    {
        return $this->belongsTo(SkTours::class, 'tour_id', 'id');
    }

    public function departureAirport()
    {
        return $this->belongsTo(Airport::class, 'departure_airport');
    }

    public function arrivalAirport()
    {
        return $this->belongsTo(Airport::class, 'arrival_airport');
    }
}
