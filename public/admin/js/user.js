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
        success: function (response){
        console.log(response);
            getTable(1);
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
        success: function (response){
          $('#addUserModal').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          console.log(response);
          getTable();
        },error: function(response){
          console.log(response);
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