@extends('admin.app')
@section('title', "SkyTours - Edit \"$tour->name\"")

@section('content')

<div class="row text-center" style="margin:10px;">
  <h4 style="margin: 5px; padding:0px;"><b>Edit tour {{$tour->name}}</b></h4>
</div>

<div class="container-fluid" style="margin-left: 5px; margin-right: 5px;">
  <div class="row card border-blue-bottom" style="padding: 10px">
    {{ Form::model($tour,[
    'route' => ['admin.skytours.tours.update', $tour->id],
    'method' => 'put',
    'autocomplete' => false,
    'files' => true
    ])
    }}
    @include('skytours::admin.tours.fields')
  </div>
  {{ Form::close() }}

  <div class="row card border-blue-bottom" style="padding: 10px">
    {{ Form::model($leg,['url' => '/admin/skytours/tours/'.$tour->id.'/legs',
    'method' => 'post',
    'class' => 'rm_fare form-inline'
    ])
    }}
    @include('skytours::admin.tours.legs')
    {{ Form::close() }}
  </div>
</div>

@endsection