<?php

namespace Modules\SkyTours\Models;

use App\Contracts\Model;

/**
 * Class SkTours
 * @package Modules\SkyTours\Models
 */
class SkTours extends Model
{
    public $table = 'sk_tours';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'start_date',
        'end_date',
        'description',
        'rules',
        'image',
        'payment',
        'award',
        'status',
        'created_by'
    ];

    // protected $casts = [
    //     'start_date' => 'date:dd-mm-yyyy',
    //     'end_date' => 'date:dd-mm-yyyy',
    // ];

    public static $rules = [
        'name' => 'required|min:3|max:255',
        'slug' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'description' => 'required',
        'payment' => 'required',
        'award' => 'required',
        'status' => 'required',
        'created_by' => 'required'
    ];

    public function legs()
    {
        return $this->hasMany(SkLegs::class, 'tour_id', 'id');
    }
}
