<?php

namespace Modules\SkyTours\Http\Controllers\Admin;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use Modules\SkyTours\Models\Enums\SkReportsStatus;
use Modules\SkyTours\Models\SkReports;

/**
 * Class ReportsController
 * @package Modules\SkyTours\Http\Controllers\Http\Controllers\Admin
 */
class ReportsController extends Controller
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
        return view('skytours::index');
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
        return view('skytours::create');
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
    public function show(Request $request)
    {
        return view('skytours::show');
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

    /**
     * Approve the specified resource.
     * 
     * @param SkReports $skreport
     * @param Request $request
     */

    public function approve(SkReports $skreport, Request $request)
    {
        $skreport->status = SkReportsStatus::APPROVED;
        $skreport->save();
        return redirect()->route('admin.skytours.index');
    }

    /**
     * Reject the specified resource.
     * 
     * @param SkReports $skreport
     * @param Request $request
     */

    public function reject(SkReports $skreport, Request $request)
    {
        $skreport->status = SkReportsStatus::REJECTED;
        $skreport->save();
        return redirect()->route('admin.skytours.index');
    }
}
