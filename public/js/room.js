$(document).ready(function () {
    console.log("room loaded");
    getTable();
  });
  
  function getTable(page){
      $.ajax({
        type: 'GET',
        url: 'room/show?page='+page,
        success:function(response){
            console.log("room loaded");
          $('#roomTable').html(response);
        },
    });
  }