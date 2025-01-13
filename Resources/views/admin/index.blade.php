@extends('skytours::layouts.admin')

@section('title', 'SkyTours')
@section('actions')
<li>
  <a href="{{ url('/skytours/admin/create') }}">
    <i class="ti-plus"></i>
    Add New</a>
</li>
@endsection
@section('content')
<div class="card border-blue-bottom" style="margin-bottom: 15px;">
  <div class="content">
    <p>Welcome to <b>{{ config('skytours.name') }}</b> a module designed to manage and customize thematic <b>tour</b>
      experiences, offering advanced tools for creating unique itineraries.
    </p>
    <p>
      It allows you to set goals, destinations, and specific
      conditions for each tour, adapting to various needs and operational styles. Additionally, it includes an intuitive
      system for tracking progress, logging achievements, and assigning rewards, providing a more interactive and
      enriching experience for users. SkyTours combines functionality and creativity, making tour management efficient,
      engaging, and professional.
    <p>
      <hr>
    <p class="d-inline"><a href="https://github.com/rcomunica" target="_blank">Created by &copy; Julián R.
        (rcomunica)</a> and <a href="https://github.com/commarka" target="_blank">&copy; CoMMArka Studios</a>
    </p>
    <p class="d-inline"><a href="https://github.com/martsime99" target="_blank">Idea from &copy; Martín S.
        (Martsime99)</a></p>

  </div>
</div>

<div class="row text-center" style="margin-left:5px; margin-right:5px;">
  <div class="col-sm-12">
    <div class="col-sm-3">
      <div class="card border-blue-bottom" style="padding:15px;">
        <h4 class="" style="margin: 5px; padding:0px;">
          <a href="{{route('admin.skytours.tours.create')}}">
            <b>Create new tours</b>
          </a>
        </h4>
        <p>Here you can view, edit, and delete the tours you have created. Click on the name of the tour to access the
          details and make the necessary changes.</p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card border-blue-bottom" style="padding:15px;">
        <h4 style="margin: 5px; padding:0px;"><b>View all tours</b></h4>
        <p>Here you can view, edit, and delete the tours you have created. Click on the name of the tour to access the
          details and make the necessary changes.</p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card border-blue-bottom" style="padding:15px;">
        <h4 style="margin: 5px; padding:0px;"><b>View all legs</b></h4>
        <p>Here you can view, edit, and delete the tours you have created. Click on the name of the tour to access the
          details and make the necessary changes.</p>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card border-blue-bottom" style="padding:15px;">
        <h4 style="margin: 5px; padding:0px;"><b>Construction...</b></h4>
        <p>...</p>
      </div>
    </div>
  </div>
</div>


<div class="row text-center" style="margin-left:5px; margin-right:5px;">
  <div class="col-sm-6 card border-blue-bottom">
    <h4 style="margin: 5px; padding:0px;"><b>Current Tours</b></h4>
    <p>Here you can view, edit, and delete the tours you have created. Click on the name of the tour to access the
      details and make the necessary changes.</p>
    <table class="table table-striped text-left">
      <thead>
        <tr>
          <th>#</th>
          <th>Tour Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tours as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td>
            <a href="{{route('admin.skytours.tours.show', $item->id)}}" class="btn btn-primary">Edit</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <div class="col-sm-1"></div>
  <div class="col-sm-5 card border-blue-bottom">
    <h4 style="margin: 5px; padding:0px;"><b>Pending tours legs</b></h4>
    <p>Here you can view pending legs for accept</p>
    <table class="table table-striped text-left">
      <thead>
        <tr>
          <th>Pilot Name</th>
          <th>Tour Name</th>
          <th>Leg</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>Test Tour</td>
          <td>Leg 1</td>
          <td>
            <a href="#" class="btn btn-success">Accept</a>
            <a href="#" class="btn btn-danger">Reject</a>
          </td>
        </tr>
    </table>
  </div>
</div>
@endsection