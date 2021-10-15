const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
      confirmButton: 'btn btn-success mx-2',
      cancelButton: 'btn btn-danger mx-2'
      
  },
  buttonsStyling: false
});

$(function () {
    //console.log("user loaded");
    getTable();
  });
  
  function getTable(page){
      $.ajax({
        type: 'GET',
        url: 'user/show?page='+page,
        success:function(response){
            //console.log("user loaded");
          $('#userTable').html(response);
        },
    });
  }

  function clearErrorText(formID) {
    $('#' + formID + ' input').removeClass('is-invalid')
    $('#' + formID + ' select').removeClass('is-invalid')
    $(document).find('#' + formID + ' span.error-text').text('');
}

function errorWarning() {
    swalWithBootstrapButtons.fire(
        'Error! ',
        'Something went wrong! Please try agan later.',
        'error'
    )
}

  // Delete Ajax
  $(document).on('submit', '.deleteUser', function (event) {
    event.preventDefault();
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "This User will be delete from the database!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Delete it!',
      cancelButtonText: 'No, Cancel!',
      reverseButtons: true
      
      }).then((result) => {
      if (result.isConfirmed) {
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
        // success: function (response){
        // console.log(response);
        //     getTable(1);
        // }
            success: function (response) {
              if (response.code == 0) {
                  errorWarning();
              } else {
                  getTable(1);

                  swalWithBootstrapButtons.fire(
                      'Successful!',
                      response.msg,
                      'success'
                  )
              }
          }
      });
    } else if (
      result.dismiss === Swal.DismissReason.cancel // click ayaw
      ) {
      swalWithBootstrapButtons.fire(
          'Cancelled',
          'Lets pretend that never happend >:)',
          'error'
      )
  }
  })
  });

  // Add Ajax
  $('#addUserForm').on('submit', function (event) {
    event.preventDefault();
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "This User will be added from the database!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, Add it!',
      cancelButtonText: 'No, Cancel!',
      reverseButtons: true
      
      }).then((result) => {
      if (result.isConfirmed) {
      console.log("Checking Add Form");
      const form = this;
  
    $.ajax({
          url: $(form).attr('action'),
          method: $(form).attr('method'),
          dataType: 'JSON',
          data: new FormData(form),
          processData: false,
          contentType: false,
        // success: function (response){
        //   $('#addUserModal').modal('hide');
        //   $('body').removeClass('modal-open');
        //   $('.modal-backdrop').remove();
        //   console.log(response);
        //   getTable();
        // },error: function(response){
        //   console.log(response);
        // }
            beforeSend: function () {
              clearErrorText('addUserForm');
          },
          success: function (response) {
              if (response.status == 0) {
                  $.each(response.error, function (prefix, val) {
                      $('#addUserForm #input_' + prefix).addClass('is-invalid')
                      $('#addUserForm span.' + prefix + '_error').text(val)
                  })
              }

              if (response.status == 1) {
                  $('#addUserModal').modal('hide');
                  getTable();

                  swalWithBootstrapButtons.fire(
                      'Successful!',
                      response.msg,
                      'success'
                  )
              }
          },
          error: function (response) {
              errorWarning()
          }
      });
    } else if (
      result.dismiss === Swal.DismissReason.cancel // click ayaw
      ) {
            swalWithBootstrapButtons.fire(
               'Cancelled',
               'Lets pretend that never happend >:)',
               'error'
           )
        }
      })
  });