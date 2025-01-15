<?php

namespace Modules\SkyTours\Http\Controllers\Api;

use App\Contracts\Controller;
use App\Models\Pirep;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Modules\SkyTours\Models\Transformers\PirepCollection;

/**
 * class PirepController
 * @package Modules\SkyTours\Http\Controllers\Api
 */
class PirepController extends Controller
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


    public function search(Request $request)
    {
        $user = Auth::user();
        $pireps = Pirep::where('user_id', $user->id)
            ->limit(5)
            ->get();

        return new PirepCollection($pireps);
    }
}
