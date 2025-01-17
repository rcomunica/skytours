<?php

namespace Modules\SkyTours\Http\Controllers\Admin;

use App\Contracts\Controller;
use App\Http\Controllers\Admin\Traits\Importable;
use App\Models\Subfleet;
use App\Repositories\AirportRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\SkyTours\Models\Enums\SkTourStatus;
use Modules\SkyTours\Models\SkLegs;
use Modules\SkyTours\Models\SkTours;

/**
 * Class ToursController
 * @package Modules\SkyTours\Http\Controllers\Http\Controllers\Admin
 */
class ToursController extends Controller
{
    use Importable;

    public function __construct(
        private readonly AirportRepository $airportRepo,
    ) {}

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return view('skytours::admin.tours.create', [
            'statuses' => SkTourStatus::select(false),
        ]);
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
        return view('skytours::admin.tours.create', [
            'statuses' => SkTourStatus::select(false),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'payment' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tour = SkTours::create(
            [
                'name' => $request->name,
                'slug' => str_slug($request->name),
                'description' => $request->description,
                'payment' => $request->payment,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'image' => $request->image,
                'status' => $request->status,
                'created_by' => auth()->user()->id,
            ]
        );

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/tours');
            $image->move($destinationPath, $name);
            $tour->image = $name;
            $tour->save();
        }

        Flash::success('Tour created successfully.');
        return redirect()->route('admin.skytours.tours.show', $tour->id);
    }

    /**
     * Show the specified resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function show(SkTours $sktour)
    {
        $airports = ['' => ''];
        $leg = null;

        if (request()->query('edit-leg')) {
            $leg = SkLegs::find(request()->query('edit-leg'));
            $airports[$leg->departureAirport->id] = $leg->departureAirport->description;
            $airports[$leg->arrivalAirport->id] = $leg->arrivalAirport->description;
        }
        return view('skytours::admin.tours.show', [
            'leg' => $leg,
            'tour' => $sktour,
            'airports' => $airports,
            'subfleets' => Subfleet::all()->pluck('name', 'id'),
            'statuses' => SkTourStatus::select(false),
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
        return view('SkyTours::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     */
    public function update(SkTours $trtour, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'payment' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        $tour = SkTours::updateOrCreate(['id' => $trtour->id], [
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'payment' => $request->payment,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_by' => auth()->user()->id,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/tours');
            $image->move($destinationPath, $name);
            $tour->image = $name;
            $tour->save();
        }


        Flash::success('Tour updated successfully.');
        return redirect()->route('admin.skytours.tours.show', $tour->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     */
    public function destroy(Request $request) {}

    /**
     * Create / edit legs for the tour
     * 
     * @param TrTours $trtour
     * @param Request $request
     */

    public function legs(SkTours $sktour, Request $request)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'departure_airport' => 'required',
                'arrival_airport' => 'required',
            ]);

            $sktour->legs()->create([
                'departure_airport' => $request->departure_airport,
                'arrival_airport' => $request->arrival_airport,
                'description' => $request->description_leg ?? '',
                'order' => $sktour->legs()->count() + 1,
            ]);

            Flash::success('Leg created successfully.');
            return redirect()->route('admin.skytours.tours.show', $sktour->id);
        } else if ($request->isMethod('put')) {
            $request->validate([
                'departure_airport' => 'required',
                'arrival_airport' => 'required',
                'leg_order' => 'required',
            ]);

            $sktour->legs()->updateOrCreate(
                ['id' => $request->leg_id],
                [
                    'departure_airport' => $request->departure_airport,
                    'arrival_airport' => $request->arrival_airport,
                    'description' => $request->description_leg ?? '',
                    'order' => $request->leg_order,
                ]
            );

            Flash::success('Leg updated successfully.');
            return redirect()->route('admin.skytours.tours.show', $sktour->id);
        }
    }
}
