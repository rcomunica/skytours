@php

@endphp
@extends('skytours::layouts.frontend')
@section('title', "\"$tour->name\" - SkyTours")

@section('content')
<h2 class="">
  {{$tour->name}}
</h2>

<div class="container-fluid text-center">
  <div class="row">
    <div class="col-md-12 mt-5">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link {{sk_tabActive('description')}}"
              href="{{request()->url() . '?show=description'}}">Description</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{sk_tabActive('legs')}}" href="{{request()->url() . '?show=legs'}}">Legs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{sk_tabActive('rules')}} disabled" href="{{request()->url() . '?show=rules'}}">Rules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{sk_tabActive('report')}}" href="{{request()->url() . '?show=report'}}">Report</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{sk_tabActive('myreport')}}" href="{{request()->url() . '?show=myreport'}}">My
              reports</a>
          </li>
        </ul>
      </div>

    </div>


    @switch(request()->query('show'))
    @case('description')
    @include('skytours::tours.description')
    @break
    @case('legs')
    @include('skytours::tours.legs')
    @break
    @case('report')
    @include('skytours::tours.report')
    @break
    @case('myreport')
    @include('skytours::tours.reports')
    @break
    @default
    @include('skytours::tours.description')
    @endswitch
    <div class="col-md-12 mt-5">
      <div class="text-end">
        <h5>Created by: <a href="#">{{$tour->user->name_private}} ({{$tour->user->pilot_id}})</a></h5>
      </div>
      <div class="text-start">
        <span>
          Power by <a href="https://github.com/rcomunica/skytours" target="_blank">SkyTours</a> (CoMMArka Studios)
        </span>
      </div>
    </div>
  </div>
</div>
@endsection