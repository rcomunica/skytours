<style>
  #map {
    height: 50vh;
    /* Ajusta la altura del mapa */
    width: 100%;
    /* Asegura que tome el ancho completo */
  }
</style>
<div class="col-md 12">
  <div class="w-100" id="map"></div>
</div>
<div class="col-md-12">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Departure</th>
        <th scope="col">Arrival</th>
        <th scope="col">Simbrief</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody class="text-start">
      @foreach ($tour->legs as $leg)
      <tr>
        <th scope="row">{{$leg->order}}</th>
        <td>{{$leg->departureAirport->description}}</td>
        <td>{{$leg->arrivalAirport->description}}</td>
        <td>{{$leg->departure_airport}}</td>
        <td>
          <button class="btn btn-primary" onclick="toggleDescription({{$leg->id}})">View more info about this
            leg</button>
        </td>
      </tr>
      <tr class="d-none" id="leg-description-{{$leg->id}}">
        <td colspan="5">
          <div class="p-3">
            <h5>Leg Description:</h5>
            <div class="mx-4 my-3">
              {!! $leg->description !!}
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@include('skytours::scripts.map')
<script>
  function toggleDescription(id)
  {
    var element = document.getElementById(`leg-description-${id}`).classList.toggle('d-none')
  }
</script>