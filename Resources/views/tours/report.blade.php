<div class="col-md-12">
  <div class="col-md-12 row align-items-center p-5">
    <table class="table table-striped rounded">
      <tbody class="text-start">
        {!! Form::open(['url' => route('skytours.report.store', $tour->id)]) !!}

        <tr>
          <td>LEG</td>
          <td>
            <p>#00 {{$lastReport->pirep->dpt_airport->id}} - XXXX</p>
          </td>
        </tr>
        <tr>
          <td>Pilot</td>
          <td>
            <p>{{Auth::user()->name_private}}.</p>
          </td>
        </tr>
        <tr>
          <td>Select pirep</td>
          <td>
            {!! Form::select('input', ['Pirep ID: b68R5gwVzpVe | SKBO - SKMD | AVA3284'], null, ['class' =>
            'form-control
            select2'])
            !!}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <button type="submit" class="btn btn-success">Send report</button>
          </td>
        </tr>
        {!! Form::close() !!}
      </tbody>
    </table>
  </div>
</div>