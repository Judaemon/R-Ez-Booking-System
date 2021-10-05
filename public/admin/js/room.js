const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

$(function () {
    getTable();
});

function getTable(page) {
    $.ajax({
        type: 'GET',
        url: 'room/show?page=' + page,
        success: function (response) {
            //console.log("room loaded");
            $('#roomTable').html(response);
        },
    });
}

// Display Edit Form
$(document).on('click', '#editBtn', function (event) {
    const id = ($(this).attr('dataId'));
    console.log(id);
    const form = this;
    $.ajax({
        method: 'GET',
        url: 'room/' + id + '/edit/',
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            $('#editRoomForm').html(response);
        },
    });
});


// Delete Ajax
$(document).on('submit', '.deleteRoom', function (event) {
    event.preventDefault();
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This Rental information will be delete from the database!",
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
                success: function (response) {
                    console.log(response);
                    getTable();
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
$('#addRoomForm').on('submit', function (event) {
    event.preventDefault();
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This Rental information will be added from the database!",
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
                type: 'POST',
                dataType: 'JSON',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#addRoomModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    console.log(response);
                    getTable();
                },
                error: function (response) {
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
        };
    });
});
