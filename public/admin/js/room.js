$(function () {
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

  // Display Edit Form
  $(document).on('click', '#editBtn', function(event){
    const id = ($(this).attr('dataId'));
    console.log(id);
    const form = this;
      $.ajax({
        method: 'GET',
        url: 'room/'+id+'/edit/',
        processData: false,
        contentType: false,
        success:function(response){
        console.log(response);
          $('#editRoomForm').html(response);
        },
      });
  });
  

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

  

  // Get Data Ajax
  // $('#editRoomButton').on('click', function (event) {
  //   event.preventDefault();
  //   console.log("Checking Edit Btn");
  //   //const form = this;
    
  //   $.ajax({
  //         url: $(form).attr('action'),
  //         method: $(form).attr('method'),
  //         type: 'POST',
  //         dataType: 'JSON',
  //         data: new FormData(form),
  //         processData: false,
  //         contentType: false,
  //       success: function (response){
  //         $('#addRoomModal').modal('hide');
  //         $('body').removeClass('modal-open');
  //         $('.modal-backdrop').remove();
  //         console.log(response);
  //         getTable();
  //       },error: function(response){
  //         console.log(response);
  //       }
  //     });
  // });