@extends('layouts.app')

@section('script')
<script src="{{ asset('js/admin/report.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="js/html2canvas.min.js"></script>
@endsection


{{-- <script>
    $(document).on('click', '#printReport', function(){
      window.location.href='genReport.php';
    })
  </script> --}}

@section('content')
<div class="container p-3">
    <div class="row" style="margin: 0px; padding-bottom: 500px;" id="testPrint">
        <div class="col-md-4">
          <canvas id="myChart" width="400" height="400"></canvas>
        </div>
      
        <div class="col-md-8"> 
          <div class="row">
          <div class="col-md-8">
            <label for="" class="form-label">Filter</label>
            <div class="input-group">
              <select innertext="" id="reportFilter" name="reportFilter" class="form-select">
                <option value="On-going">On-going</option>
                <option value="Pending">Pending</option>
                <option value="Cancelled">Cancelled</option>
                <option value="Finished">Finished</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <label for="" class="form-label">Print</label>
            <div class="input-group">
              <button type="button" id="printReport" class="btn btn-primary py-2 w-100">Print</button>
            </div>
          </div>
          </div>
      
          <div id="reportTable">
            
          </div>
        </div>
      </div>
</div>
@endsection
