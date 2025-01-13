<div class="row">
  <div class="col-sm-1">
    {{ Form::label('id', 'Tour Id:') }}
    {{Form::number('id', null, ['class' => 'form-control', 'disabled'])}}
    <p class="text-danger">{{ $errors->first('id') }}</p>
  </div>
  <div class="col-sm-4 @error('name') has-error @enderror">
    {{ Form::label('name', 'Tour Name:') }}
    {{Form::text('name', null, ['class' => 'form-control'])}}
    <p class="text-danger">{{ $errors->first('name') }}</p>
  </div>
  <div class="col-sm-3 @error('slug') has-error @enderror">
    {{ Form::label('slug', 'Slug:') }}
    {{Form::text('slug', null, ['class' => 'form-control', 'disabled'])}}
    <p class="text-danger">{{ $errors->first('slug') }}</p>
  </div>
  <div class="col-sm-4 @error('slug') has-error @enderror">
    {{ Form::label('status', 'Status:') }}
    {{ Form::select('status', $statuses, null, ['class' => 'select2 form-control',
    'placeholder' =>
    'Select
    Tour status']) }}
    <p class="text-danger">{{ $errors->first('slug') }}</p>
  </div>
</div>


<div class="form-group">
  {{ Form::label('description', 'Tour Description:') }}
  <td>{!! Form::textarea('description', null, ['id' => 'description_editor', 'class' => 'editor']) !!}</td>
  <p class="text-danger">{{ $errors->first('description') }}</p>

</div>



<div class="row">
  <div class="col-sm-4 @error('start_date') has-error @enderror">
    {{ Form::label('start_date', 'Start Date:') }}
    {{ Form::date('start_date', null, ['class' => 'form-control']) }}
    <p class="text-danger">{{ $errors->first('start_date') }}</p>

  </div>
  <div class="col-sm-4 @error('end_date') has-error @enderror">
    {{ Form::label('end_date', 'End date:') }}
    {{ Form::date('end_date', null, ['class' => 'form-control']) }}
    <p class="text-danger">{{ $errors->first('end_date') }}</p>

  </div>

  <div class="col-sm-4 @error('price') has-error @enderror">
    {{ Form::label('payment', '($) Tour Price:') }}
    {{Form::number('payment', null, ['class' => 'form-control'])}}
    @component('admin.components.info')
    The earnings the pilot receives when completing the <b>tour</b>.
    @endcomponent
    <p class="text-danger">{{ $errors->first('price') }}</p>

  </div>
</div>
<div class="form-group
                  @error('image')
                      has-error
                  @enderror">
  {{ Form::label('image', 'Tour Image:') }}
  {{ Form::file('image', ['class' => 'form-control']) }}
  <p class="text-danger">{{ $errors->first('image') }}</p>
</div>
{{ Form::button('<i class="fas fa-plus-circle"></i>&nbsp;Save', ['type' => 'submit', 'class' => 'btn btn-success
btn-s']) }}
{{-- {{ Form::button('<i class="fas fa-file"></i>&nbsp;Draft', ['type' => 'submit', 'class' => 'btn btn-warning
btn-s']) }} --}}
<a href="{{ route('admin.skytours.index') }}" class="btn btn-danger">
  <i class="fas fa-minus-circle"></i>&nbsp;Cancel
</a>



<script>
  $(document).ready(function () { CKEDITOR.replace('description_editor'); });
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
      CKEDITOR.replace('edit_body')
      $('#edit_title').html('Edit News: ' + tours.subject);
      $('#edit_subject').val(news.subject)
      CKEDITOR.instances.edit_body.setData(tours.body)
      $('#edit_id').val(tours.id)
      $('#add_news').hide();
      $('#edit_news').show();
    }

    function closeEdit() {
      $('#edit_news').hide();
      $('#add_news').show()
    }

</script>
@endsection