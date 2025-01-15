@section('scripts')
@parent
<script>
  $(document).ready(function() {
    $.ajax({
      url: '{{route('api.skytours.legs.show', [$tour->id])}}',
      type: 'GET',
      headers: {
        'x-api-key': '{!! Auth::check() ? Auth::user()->api_key: '' !!}'
      },
      success: function(res){
        var body = res['data']
        
        const map = L.map('map').setView([body[0].arrival_airport.latitude,body[0].arrival_airport.longitude], 3); // Coordenadas de Medellín, Colombia

        // Añadir un mapa base (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | &copy; CoMMArka Studios'
        }).addTo(map);

        var lines = []
        for (const element of body) {
          
        L.marker([element.departure_airport.latitude, element.departure_airport.longitude]).addTo(map);
          
          L.marker([element.arrival_airport.latitude, element.arrival_airport.longitude]).addTo(map);
          lines.push({
              "type": "LineString",
              "coordinates": [
                [element.departure_airport.longitude, element.departure_airport.latitude], 
                [element.arrival_airport.longitude, element.arrival_airport.latitude]
              ]
          }
          );  
        }

        var style = {
            "color": "#ff7800",
            "weight": 2,
            "opacity": 0.65
        };
        
        L.geoJSON(lines, {
          style: style
        }).addTo(map);

      },
      error: function(error){
        console.error(error);
      }
    })
  })




</script>
@endsection