$(document).ready(function() {
  displayReportTable("Accepted");
  getGraphData();
});

function displayReportTable(filter) {
  $.ajax({
    url: "classes/reportsPHP/reportView.php",
    type: "POST",
    data: {status: filter, action: "getReportTbl"},
    success:function (response) {
      $('#reportTableContainer').html(response);
    }
  });
}

$(document).on('change', '#reportFilter', function(){
  // console.log(($(this).val()));
  let filter = $(this).val();

  displayReportTable(filter);
});

var graphData = [];

function getGraphData() {
  $.ajax({
    url: "classes/reportsPHP/reportCtrl.php",
    type: "POST",
    data: {action: "getGraphData"},
    success:function (response) {
      graphData = response.split(', ');
      // console.log(graphData);
    }
  }).then(()=>{
    generateGraph();
  });
}

function generateGraph() {
  var ctx = document.getElementById('myChart').getContext('2d');
    
  var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ["Accepted", "Pending", "Declined", "Cancelled"],
          datasets: [{
              label: '# of Votes',
              data: graphData,
              backgroundColor: [
                'rgba(101, 209, 101, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)'
              ],
              borderColor: [
                'rgba(101, 209, 101, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)'
              ],
              borderWidth: 2
          }]
      },
      options: {
          scales: {
              y: {
                  // beginAtZero: true
              }
          }
      }
  });
}