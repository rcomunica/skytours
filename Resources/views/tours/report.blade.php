<div class="col-md-12">
  <div class="col-md-12 row align-items-center p-5">
    <table class="table table-striped rounded">
      <tbody class="text-start">
        {!! Form::open(['url' => route('skytours.report.store', $tour->id)]) !!}
        {!! Form::hidden('leg_id', $nxLeg->id) !!}
        <tr>
          <td>LEG</td>
          <td>
            <p>#{{$nxLeg->order}} {{$nxLeg->departure_airport}} -
              {{$nxLeg->arrival_airport}}
            </p>
          </td>
        </tr>
        <tr>
          <td>Pilot</td>
          <td>
            <p>{{Auth::user()->name_private}}.</p>
          </td>
        </tr>
        <tr>
          <td>{!! Form::label('pirep_id', 'Select pirep', []) !!}</td>
          <td>
            {!! Form::select('pirep_id', $pireps, null, ['class' =>
            'form-control pirep_search'])
            !!}
          </td>
        </tr>
        <tr>
          <td colspan="2" class="text-end">
            <button type="submit" class="btn btn-success">Send report</button>
          </td>
        </tr>
        {!! Form::close() !!}
      </tbody>
    </table>
  </div>
</div>

@include('skytours::scripts.pireps')