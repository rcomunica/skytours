@extends('admin.app')
@section('title', 'SkyTours - Create Tour')

@section('content')

<div class="row text-center" style="margin:10px;">
  <h4 style="margin: 5px; padding:0px;"><b>Create a new tour</b></h4>
</div>

<div class="container-fluid" style="margin-left: 5px; margin-right: 5px;">
  <div class="row card border-blue-bottom" style="padding: 10px">
    {{ Form::open(['route' => 'admin.skytours.tours.store', 'method' => 'post', 'autocomplete' => false, 'files' =>
    true])
    }}
    @include('skytours::admin.tours.fields')
    {{Form::close()}}
  </div>

</div>

@endsection