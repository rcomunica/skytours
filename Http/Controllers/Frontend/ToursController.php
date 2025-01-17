<?php

namespace Modules\SkyTours\Http\Controllers\Frontend;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Modules\SkyTours\Models\Enums\SkReportsStatus;
use Modules\SkyTours\Models\SkLegs;
use Modules\SkyTours\Models\SkReports;
use Modules\SkyTours\Models\SkTours;

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
     * Store a newly created resource in storage (reports).
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(SkTours $sktour, Request $request)
    {
        $request->validate([
            'pirep_id' => 'required',
            'leg_id' => 'required',
        ]);

        $report = SkReports::create([
            'leg_id' => $request->input('leg_id'),
            'user_id' => Auth::user()->id,
            'pirep_id' => $request->input('pirep_id'),
            'tour_id' => $sktour->id,
            'status' => SkReportsStatus::PENDING,
        ]);

        Flash::success('Leg report created successfully!');
        return redirect()->route('skytours.tours.show', $sktour->slug);
    }

    /**
     * Show the specified resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function show(SkTours $sktour, Request $request)
    {
        $pireps = ['' => ''];

        // Show only in the report page
        if (request()->query('show') == 'report') {

            // Get any pending report leg
            $pendingReport = SkReports::where('user_id', Auth::user()->id)
                ->where('tour_id', $sktour->id)
                ->where('status', SkReportsStatus::PENDING)
                ->first();

            // Verify if the user has a pending report
            if ($pendingReport) {
                Flash::warning('At the moment you have a pending report for this tour');
                return redirect()->route('skytours.tours.show', $sktour->slug);
            }

            // Get the last approved report
            $report = SkReports::where('user_id', Auth::user()->id)
                ->where('tour_id', $sktour->id)
                ->where('status', SkReportsStatus::APPROVED)
                ->first();

            // Verify if the user don't have any report
            if (!$report) {
                $nxLeg = SkLegs::where('tour_id', $sktour->id)
                    ->where('order', 1)
                    ->first();
            } else {
                $nxLeg = $report->getNextLeg();
            }
            $pireps[$nxLeg->id] = "Pirep ID:" . $nxLeg->id . "|" . $nxLeg->dpt_airport . "-" .  $nxLeg->arr_airport_id  . "|" .  $nxLeg->ident;
        } else if (request()->query('show') == 'myreport') {
            $reports = SkReports::where('user_id', Auth::user()->id)
                ->where('tour_id', $sktour->id)
                ->get();
        }

        return view('skytours::tours.show', [
            'tour' => $sktour,
            'pireps' => $pireps,
            'reports' => $reports ?? null,
            'nxLeg' => $nxLeg ?? null,
            'report' => $report ?? null,
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
