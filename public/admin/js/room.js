$(function () {
    console.log("room loaded");
    getTable();
  });
  
  function getTable(page){
      $.ajax({
        type: 'GET',
        url: 'room/show?page='+page,
        success:function(response){
            //console.log("room loaded");
          $('#roomTable').html(response);
        },
    });
  }
  // Delete Ajax
  $(document).on('submit', '.deleteRoom', function (event) {
    event.preventDefault();
    console.log("Checking Delete Form");
    const form = this;

    $.ajax({
          url: $(form).attr('action'),
          method: $(form).attr('method'),
          type: 'DELETE',
          dataType: 'JSON',
          data: new FormData(form),
          processData: false,
          contentType: false,
        success: function (response){
        console.log(response);
            getTable();
        }
      });
  });

  // Add Ajax
  $('#addRoomForm').on('submit', function (event) {
    event.preventDefault();
    console.log("Checking Add Form");
    const form = this;
  
    $.ajax({
          url: $(form).attr('action'),
          method: $(form).attr('method'),
          type: 'POST',
          dataType: 'JSON',
          data: new FormData(form),
          processData: false,
          contentType: false,
        success: function (response){
          $('#addRoomModal').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          console.log(response);
          getTable();
        },error: function(response){
          console.log(response);
        }
      });
  });