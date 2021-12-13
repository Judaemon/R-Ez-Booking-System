
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function generateGraph(getGraphData) {
  var ctx = document.getElementById('myChart').getContext('2d');
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
let statusArray = [];


$(function () {
  // console.log("dashboard js");
  getReportArray();
  getRentalTable();

  // generateGraph(getGraphData);
});

function getReportArray() {
  $.ajax({
      type: 'GET',
      url: 'getBookingCount',
      
      success: function (response) {
        // getGraphData = response.bookingCount;
          // console.log(response.bookingCount);

          response.bookingCount.forEach(booking => {
            // console.log(booking.bookingCount);
            statusArray.push(booking.bookingCount);

            // getGraphData += booking.bookingCount+','
            // console.log(getGraphData);
            
          });
          console.log(statusArray);

          // console.log(getGraphData);
          // genAccountList(response.bookingCount);
      },
      error: function () {
          errorNotif();
      },
  }).then(()=>{
    generateGraph(statusArray);
  });
}

function getRentalTable(page) {
  $.ajax({
      type: 'GET',
      url: 'getUserCount',
      success: function (response) {
          // console.log(response.userCount[0].userCount);
          genAccountList(response.userCount);
      },
      error: function () {
          errorNotif();
      },
  });
}

$(document).on('change', '#reportFilter', function(){
  var reportFilter = document.getElementById('reportFilter').value;
  console.log(reportFilter);

  getTableData(reportFilter);
});

$(document).on('click', '#reportTableContainer', function(){
  console.log("PRINTING BUTTON TEST");
});

function getTableData(filter) {
  $.ajax({
      type: 'POST',
      url: 'bookingFilter',
      data: {filter: filter},
      success: function (response) {
        console.log(response);
        $('#reportTableContainer').html(response);
      },
      error: function (response) {
        console.log(response);
          errorNotif();
      },
  });
}

function errorNotif() {
  swalWithBootstrapButtons.fire(
      'Error! ',
      'Something went wrong! Please try agan later.',
      'error'
  )
}

//account counter
function genAccountList(bookingArray) {
  console.log("genaccountlist");
  let htmlCode = ""
  bookingArray.forEach(account => {
      htmlCode += `<div class="col-4">
                      <h5>`+account.account_type+`</h5>
                      <h1>`+account.userCount+`</h1>
                  </div>`
      
      // console.log(account.account_type);
      // console.log(account.userCount);
      
  });

  $('#accountContainer').html(htmlCode);

}