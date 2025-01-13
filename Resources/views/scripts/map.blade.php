@section('scripts')
@parent
<script>
  // Crear el mapa y centrarlo en una coordenada
const map = L.map('map').setView([6.2442, -75.5812], 13); // Coordenadas de Medellín, Colombia

// Añadir un mapa base (OpenStreetMap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Añadir un marcador en el centro del mapa
const marker = L.marker([6.2442, -75.5812]).addTo(map)
    .bindPopup('¡Hola desde Medellín!')
    .openPopup();

</script>
@endsection