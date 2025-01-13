@extends('skytours::layouts.frontend')

@section('title', 'SkyTours')

@section('content')
<h1>Tours Availables</h1>

<div class="container-fluid text-center ">
  <div class="row">
    @foreach ($tours as $item)
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">{{ $item->name }}</h5>
        </div>
        <img src="{{ public_asset('uploads/tours/'.$item->image) }}" width="150px" class="card-img"
          alt="{{$item->name}} image tour">
        <div class="card-body">
          <p class="card-text">
          <ul class="list-group list-group-flush text-left">
            <li class="list-group-item"><b>Legs:</b> {{$item->legs->count()}}</li>
            <li class="list-group-item">
              <b>Start Date:</b> {{$item->start_date}} /
              <b>End Date:</b> {{$item->end_date}}
            </li>
            <li class="list-group-item">
              <b>Payment: </b>{{currency(setting('units.currency', 'USD'))->getSymbol() .
              $item->payment}}
            </li>
          </ul>
          </p>
          <a href="{{ route('skytours.tours.show', $item->slug) }}" class="btn btn-primary">View</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection