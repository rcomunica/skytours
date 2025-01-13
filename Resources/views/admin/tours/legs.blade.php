<div id="aircraft_fares_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
  <div class="header">
    <h3>Legs</h3>
    @component('admin.components.info')
    Here you can add legs to the tour. A leg is a flight from one airport to another.
    Also you can set some instructions for the leg.
    @endcomponent
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="text-left">

        @if (!request()->query('add-legs') || request()->query('add-legs') === 'false')

        <a href="{{ request()->fullUrlWithQuery(['add-legs' => 'true']) }}" class="btn btn-primary mb-5">
          Add Leg
        </a>
        @elseif (request()->query('add-legs') === 'true')



        <div class="form-group col-md-12">
          <div class="form-group col-md-3 @error('departure_airport') has-error @enderror">
            {{{ Form::label('departure_airport', "Departure Airport:") }}}
            {{ Form::select('departure_airport', $airports, null, ['class' => 'form-control select2 airport_search ',
            'placeholder' =>
            'Select
            Departure Airport']) }}
            <p class="text-danger">{{ $errors->first('departure_airport') }}</p>

          </div>
          <div class="form-group col-md-3 @error('arrival_airport') has-error @enderror">
            {{{ Form::label('arrival_airport', "Arrival Airport:") }}}
            {{ Form::select('arrival_airport', $airports, null, ['class' => 'form-control select2 airport_search',
            'placeholder' =>
            'Select
            Arrival Airport']) }}
            <p class="text-danger">{{ $errors->first('arrival_airport') }}</p>

          </div>
        </div>

        <div class="form-group col-md-12 @error('description_leg') has-error @enderror">
          {{{ Form::label('description_leg', "Leg description") }}}
          {!! Form::textarea('description_leg', '', ['id' => 'leg_editor', 'class' => 'editor']) !!}
          <p class="text-danger">{{ $errors->first('description_leg') }}</p>

        </div>

        <div class="form-group col-md-12">
          {{ Form::button('<i class="glyphicon glyphicon-plus"></i> add',
          ['type' => 'submit',
          'class' => 'btn btn-success btn-s']) }}
          <a href="{{ request()->fullUrlWithQuery(['edit-leg' => null, 'add-legs' => null]) }}" class="btn btn-danger">
            <i class="glyphicon glyphicon-remove"></i> Cancel
          </a>
        </div>

        {{ Form::close() }}
        @endif

        @if ($tour->legs->count() > 0)
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>Departure Airport</th>
              <th>Arrival Airport</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tour->legs as $leg)
            <tr>
              <td>{{ $leg->departureAirport->description }}</td>
              <td>{{ $leg->arrivalAirport->description}}</td>
              <td>
                <a href="{{ request()->fullUrlWithQuery(['edit-leg' => $leg->id, 'add-legs' => null]) }}"
                  class="btn btn-primary">
                  Show leg
                </a>
                <a href="{{ request()->fullUrlWithQuery(['delete-leg' => $leg->id]) }}" class="btn btn-danger">
                  Delete
                </a>
              </td>
            </tr>
            @if (request()->query('edit-leg') == $leg->id)
            <tr>
              <td colspan="3">
                <div class="row">
                  <div class="col-md-12">
                    <h3>Edit Leg</h3>
                    {{ Form::open(['url' => '/admin/skytours/tours/'.$tour->id.'/legs',
                    'method' => 'put',
                    'class' => 'rm_fare form-inline'
                    ])
                    }}
                    {{ Form::hidden('leg_id', $leg->id) }}
                    <div class="form-group col-md-12 row max-h">
                      <div class="form-group col-sm-4 @error('departure_airport') has-error @enderror">
                        {{{ Form::label('departure_airport', "Departure Airport:") }}}
                        {{ Form::select('departure_airport', $airports, null, ['class' =>
                        'select2
                        airport_search',
                        'placeholder' => 'Select Departure Airport',
                        'style' => 'width: 100%']) }}
                        <p class="text-danger">{{ $errors->first('departure_airport') }}</p>

                      </div>
                      <div class="form-group col-sm-4 @error('arrival_airport') has-error @enderror">
                        {{{ Form::label('arrival_airport', "Arrival Airport:") }}}
                        {{ Form::select('arrival_airport',$airports, null, ['class' =>
                        'form-control select2
                        airport_search',
                        'placeholder' => 'Select Arrival Airport',
                        'style' => 'width: 100%']) }}
                        <p class="text-danger">{{ $errors->first('arrival_airport') }}</p>
                      </div>
                      <div class="form-group col-sm-4 @error('leg_order') has-error @enderror">
                        {{{ Form::label('leg_order', "Leg Order:") }}}
                        {{ Form::number('leg_order', $leg->order, ['class' => 'form-control', 'max' =>
                        $tour->legs->count(),
                        'style' => 'width: 100%']) }}
                        <p class="text-danger">{{ $errors->first('leg_order') }}</p>
                      </div>
                    </div>

                    <div class="form-group col-md-12 @error('description_leg') has-error @enderror">
                      {{{ Form::label('description_leg', "Leg description") }}}
                      {!! Form::textarea('description_leg', $leg->description, ['id' => 'leg_editor', 'class' =>
                      'editor']) !!}
                      <p class="text-danger">{{ $errors->first('description_leg') }}</p>
                    </div>

                    <div class="form-group col-md-12">
                      {{ Form::button('<i class="glyphicon glyphicon-plus"></i> add',
                      ['type' => 'submit',
                      'class' => 'btn btn-success btn-s']) }}
                      <a href="{{ request()->fullUrlWithQuery(['edit-leg' => null, 'add-legs' => null]) }}"
                        class="btn btn-danger">
                        <i class="glyphicon glyphicon-remove"></i> Cancel
                      </a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
        @endif

      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function () { CKEDITOR.replace('leg_editor'); });
  if (typeof $('input').iCheck !== 'undefined') {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'icheckbox_square-blue'
    });
  }
</script>

@section('scripts')
@parent
<script src="{{ public_asset('assets/vendor/ckeditor4/ckeditor.js') }}"></script>
<script>
  // This is the script that will be used to edit the tours
  function editTours(tours) {
      CKEDITOR.replace('leg_editor')
      $('#edit_title').html('Edit News: ' + tours.subject);
      $('#edit_subject').val(news.subject)
      CKEDITOR.instances.leg_editor.setData(tours.body)
      $('#edit_id').val(tours.id)
      $('#add_news').hide();
      $('#edit_news').show();
    }

    function closeEdit() {
      $('#edit_news').hide();
      $('#add_news').show()
    }
</script>
@include('admin.scripts.airport_search')

@endsection