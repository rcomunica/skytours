@extends('skytours::layouts.frontend')

@section('title', "\"$tour->name\" - SkyTours")

@section('content')
<h2 class="">
  {{$tour->name}}
</h2>

<div class="container-fluid text-center">
  <div class="row">
    <div class="col-md-12">
      <img src="{{public_asset('uploads/tours/'. $tour->image)}}" class="" width="50%" alt="">
    </div>
    <div class="col-md-12 mt-5">
      <div class="col-md-5">
        <a href="" class="btn btn-primary">
          Show description
        </a>
        <a href="" class="btn btn-primary">
          Show rules
        </a>
        <a href="" class="btn btn-primary">
          Show legs
        </a>
        <a href="" class="btn btn-primary">
          Report
        </a>
      </div>

    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="text-start mt-5">
            <h3>Description:</h3>
            {!! $tour->description !!}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="text-end">
        <h5>Created by: <a href="#">Pepito P (XXX101)</a></h5>
      </div>
    </div>
  </div>
</div>
@endsection