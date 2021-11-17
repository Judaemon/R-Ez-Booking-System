@extends("layouts.app")

@section('script')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection

@section('content')
{{-- <h1>DASHBOARD YAWA</h1> --}}


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<?php
 
 $dataPoints = array( 
	array("y" => 50,"label" => "Barkada Hut" ),
	array("y" => 100,"label" => "Regular Hut" ),
	array("y" => 0,"label" => "Couple Hut" ),
	array("y" => 50,"label" => "Villa" ),
	array("y" => 25,"label" => "Superior" ),
	array("y" => 100,"label" => "Kubo" )
);

?>

<script>
    window.onload = function() {
     
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
            text: "Room Availability"
        },
        axisY: {
            maximum: 100,
            includeZero: true,
		    suffix:  "%"
        },
        data: [{
            type: "bar",
            yValueFormatString: "#,##0",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            indexLabelFontWeight: "bolder",
            indexLabelFontColor: "white",
            dataPoints: [{label: "Kubo", y: 100},{label:"Superior", y: 25},{label:"Villa", y: 50}]
        }]
    });
    chart.render();
     
    }
</script>

<div class="container" style="margin-top: 1rem;">
    <div class="row">

        <div class="col-6">
            <div class="row" style="text-align: center">
                <h1>ACCOUNTS</h1>
                <div id="accountContainer" class="row">
                    {{-- <div class="col-4">
                        <h5>user</h5>
                        <h1>1</h1>
                    </div>--}}
                </div>           
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        Message of the day
                    </div>
                    <div class="card-body">
                        <h3>Have a Goodday everyone, Stay Strong! :)</h3>
                    </div>
                </div>
                </div>  
            </div>
        </div>

        

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Room Availability
                  </div>
                <div class="card-body">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
    
</div>
 
@endsection

