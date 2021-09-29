$(function () {
    console.log("rental loaded");
    getTable();
  });
  
  function getTable(page){
      $.ajax({
        type: 'GET',
        url: 'rental/show?page='+page,
        success:function(response){
            //console.log("room loaded");
          $('#rentalTable').html(response);
        },
    });
  }
  
  // Delete Ajax
  $(document).on('submit', '.deleteRental', function (event) {
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
  $('#addRentalForm').on('submit', function (event) {
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
          $('#addRentalModal').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          console.log(response);
          getTable();
        },error: function(response){
          console.log(response);
        }
      });
  });