<?php

namespace Modules\SkyTours\Models;

use App\Contracts\Model;
use App\Models\Pirep;
use App\Models\User;
use Modules\SkyTours\Models\Enums\SkReportsStatus;

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
        'tour_id',
        'status'
    ];

    protected $casts = [];

    public static $rules = [
        'leg_id' => 'required',
        'user_id' => 'required',
        'pirep_id' => 'required',
        'tour_id' => 'required',
        'status' => 'required'
    ];

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

    public function getNextLeg()
    {


        $actualLegs = SkReports::where('user_id', $this->user_id)
            ->where('status', SkReportsStatus::APPROVED)
            ->where('tour_id', $this->tour_id)
            ->count();

        $next_leg = SkLegs::where('order', $this->leg->order + $actualLegs)
            ->where('tour_id', $this->leg->tour_id)
            ->first();


        return $next_leg;
    }
}
