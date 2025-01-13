<?php

namespace Modules\SkyTours\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use Modules\SkyTours\Models\SkTours;
use Modules\SkyTours\Models\TrTours;

/**
 * Class ToursController
 * @package Modules\SkyTours\Http\Controllers\Http\Controllers\Frontend
 */
class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return view('skytour::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function create(Request $request)
    {
        return view('skytour::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function show(SkTours $sktour, Request $request)
    {
        return view('skytours::tours.show', [
            'tour' => $sktour
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function edit(Request $request)
    {
        return view('skytours::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     */
    public function update(Request $request) {}

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     */
    public function destroy(Request $request) {}
}
