@section('scripts')
@parent

<script>
  $(document).ready(function () {
    $("select.pirep_search").select2({
      ajax: {
        url: '{{route('api.skytours.pirep.search')}}',
        data: function (params) {
          return {
            arr: '{{$nxLeg->arrival_airport}}',
            dpt: '{{$nxLeg->departure_airport}}',
          }
        },
        headers: {
        'x-api-key': '{!! Auth::check() ? Auth::user()->api_key: '' !!}'
        },
        processResults: function (data, params) {
          if (!data.data) { return [] }
          const results = data.data.map(apt => {
            return {
              id: apt.id,
              text: `Pirep ID: ${apt.id} | ${apt.dpt_airport} - ${apt.arr_airport_id} | ${apt.callsing}`,
            }
            console.log(data);
            
          });
          
          const pagination = {
            more: null,
          }
  
          return {
            results,
            pagination,
          };
        },
        cache: true,
        dataType: 'json',
        delay: 250,
        minimumInputLength: 2,
      },
      width: 'resolve',
      placeholder: 'Type to search',
    });
  });
  
</script>


@endsection