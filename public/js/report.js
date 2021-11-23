// $(document).ready(function() {
//   displayReportTable("Accepted");
//   getGraphData();
// });

// function displayReportTable(filter) {
//   $.ajax({
//     url: "classes/reportsPHP/reportView.php",
//     type: "POST",
//     data: {status: filter, action: "getReportTbl"},
//     success:function (response) {
//       $('#reportTableContainer').html(response);
//     }
//   });
// }

// $(document).on('change', '#reportFilter', function(){
//   console.log(($(this).val()));
//   let filter = $(this).val();

//   displayReportTable(filter);
// });

// var graphData = [];

// function getGraphData() {
//   $.ajax({
//     url: "classes/reportsPHP/reportCtrl.php",
//     type: "POST",
//     data: {action: "getGraphData"},
//     success:function (response) {
//       graphData = response.split(', ');
//       console.log(graphData);
//     }
//   }).then(()=>{
//     generateGraph();
//   });
// }

function generateGraph(getGraphData) {
  var ctx = document.getElementById('myChart').getContext('2d');

  console.log(getGraphData);
  var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Booked", "Cancelled", "Finished", "Ongoing", "Pending"],
          datasets: [{
              label: '# of Votes',
              data: getGraphData,
              backgroundColor: [
                'rgba(101, 209, 101, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 150, 132, 0.2)'
              ],
              borderColor: [
                'rgba(101, 209, 101, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 150, 132, 1)'
              ],
              borderWidth: 2
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
}

// let getGraphData = "1,2,3,4,5";
let getGraphData = "";
let stringTest = [];


$(function () {
  // console.log("dashboard js");
  getRentalTable();
  // generateGraph(getGraphData);
});

function getRentalTable(page) {
  $.ajax({
      type: 'GET',
      url: 'getBookingCount',
      success: function (response) {
        // getGraphData = response.bookingCount;
          console.log(response.bookingCount);
          response.bookingCount.forEach(booking => {
            console.log(booking.bookingCount);
            stringTest.push(booking.bookingCount);
            // getGraphData += booking.bookingCount+','
            // console.log(getGraphData);
            
          });
          console.log(stringTest);

          // console.log(getGraphData);
          // genAccountList(response.bookingCount);
      },
      error: function () {
          errorNotif();
      },
  }).then(()=>{
    generateGraph(stringTest);
  });
}

function errorNotif() {
  swalWithBootstrapButtons.fire(
      'Error! ',
      'Something went wrong! Please try agan later.',
      'error'
  )
}

function genAccountList(bookingArray) {
  console.log("genaccountlist");
  let htmlCode = ""
  bookingArray.forEach(booking => {
      htmlCode += `<div class="col-4">
                      <h5>`+booking.booking_status+`</h5>
                      <h1>`+booking.bookingCount+`</h1>
                  </div>`
      
      // console.log(account.account_type);
      // console.log(account.userCount);
      
  });

  $('#accountContainer').html(htmlCode);

}

function renderChart(roomArray) {
  //select count(*),room_type from rooms group by room_type;
}