<?php

namespace Modules\SkyTours\Models;

use App\Contracts\Model;
use App\Models\Pirep;
use App\Models\User;

/**
 * Class SkReports
 * @package Modules\SkyTours\Models
 */
class SkReports extends Model
{
    public $table = 'sk_reports';
    protected $fillable = [
        'leg_id',
        'user_id',
        'pirep_id',
        'status'
    ];

    protected $casts = [];

    public static $rules = [];

    public function leg()
    {
        return $this->belongsTo(SkLegs::class, 'leg_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pirep()
    {
        return $this->belongsTo(Pirep::class, 'pirep_id');
    }

    public function tour()
    {
        return $this->belongsTo(SkTours::class, 'tour_id');
    }
}
