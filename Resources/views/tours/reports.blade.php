<div class="col-md-12">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Leg</th>
        <th>Departure</th>
        <th>Arrival</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($reports as $report)
      <tr>
        <td>#{{$report->leg->order}}</td>
        <td>{{$report->leg->departureAirport->description}}</td>
        <td>{{$report->leg->arrivalAirport->description}}</td>
        <td>
          @if($report->status == 'approved')
          <span class="badge bg-success">Completed</span>
          @elseif ($report->status == 'pending')
          <span class="badge bg-warning">Pending</span>
          @else
          <span class="badge bg-danger">Not Approved</span>
          @endif
        </td>
      </tr>
      @endforeach
  </table>
</div>