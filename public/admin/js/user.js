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
  });

  // Add Ajax
  $('#addUserForm').on('submit', function (event) {
    event.preventDefault();
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
  });