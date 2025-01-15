<?php

namespace Modules\SkyTours\Http\Controllers\Api;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use Modules\SkyTours\Models\SkLegs;
use Modules\SkyTours\Models\SkTours;
use Modules\SkyTours\Models\Transformers\LegsCollection;
use Modules\SkyTours\Models\Transformers\LegsResource;

/**
 * class ToursController
 * @package Modules\SkyTours\Http\Controllers\Api
 */
class ToursController extends Controller
{
    /**
     * Just send out a message
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->message('Hello, world!');
    }

    public function legs(SkTours $sktour, Request $request)
    {

        $legs = $sktour->legs()->orderBy('order', 'asc')->get();
        return new LegsCollection($legs);
    }
}
