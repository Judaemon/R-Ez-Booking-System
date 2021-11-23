@extends('layouts.app')

@section('script')
<script src="{{ asset('js/report.js') }}"></script>
{{-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="js/html2canvas.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script src="js/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>

@endsection


{{-- <script>
    $(document).on('click', '#printReport', function(){
      window.location.href='genReport.php';
    })
  </script> --}}

@section('content')

<div class="container" style="margin-top: 1rem;">
  {{-- <div class="row">

      <div class="col-6">
          <div class="row" style="text-align: center">
              <div id="accountContainer" class="row">
                  <div class="col-4">
                      <h5>user</h5>
                      <h1>1</h1>
                  </div>
              </div>           
          </div>

      </div>
      
  </div> --}}

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
            <option value="Accepted">Accepted</option>
            <option value="Pending">Pending</option>
            <option value="Declined">Declined</option>
            <option value="Cancelled">Cancelled</option>
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
      <!-- --------------------------------  -->
  
      <div id="reportTableContainer">
        <!-- <table class="table table-tripped table-light mt-2">
          <thead class="thead-dark text-center justify-content-center">
            <tr>
              <th class="p-2 py-3" scope="col">Order ID</th>
              <th class="p-2 py-3" scope="col">Customer name</th>
              <th class="p-2 py-3" scope="col">Bento name</th>
              <th class="p-2 py-3" scope="col">Dish names</th>
              <th class="p-2 py-3" scope="col">Date order</th>
              <th class="p-2 py-3" scope="col">Total price</th>
              <th class="p-2 py-3" scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="px-1 text-break">1</th>
              <td class="px-1 text-break">MarkMarkMarkMarkMarkMarkMarkMarkMarkMark</td>
              <td class="px-1 text-break">OttoOttoOttoOtto</td>
              <td class="px-1 text-break">@mdomdomdomdomdo</td>
              <td class="px-1 text-break">@</td>
              <td class="px-1 text-break">@mmdodo</td>
              <td class="px-1 text-break">@mdo</td>
            </tr>
          </tbody>
        </table> -->
      </div>
    </div>
  </div>
  
</div>

@endsection



{{-- <div class="container p-3">
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
</div> --}}