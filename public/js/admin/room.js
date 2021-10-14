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
                // success: function (response) {
                //     console.log(response);
                //     getTable();
                // }
                success: function (response) {
                    if (response.code == 0) {
                        errorWarning();
                    } else {
                        getTable();

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
                // success: function (response) {
                //     $('#addRoomModal').modal('hide');
                //     $('body').removeClass('modal-open');
                //     $('.modal-backdrop').remove();
                //     console.log(response);
                //     getTable();
                // },
                // error: function (response) {
                //     console.log(response);
                // }
                beforeSend: function () {
                    clearErrorText('addRoomForm');
                },
                success: function (response) {
                    if (response.status == 0) {
                        $.each(response.error, function (prefix, val) {
                            $('#addRoomForm #input_' + prefix).addClass('is-invalid')
                            $('#addRoomForm span.' + prefix + '_error').text(val)
                        })
                    }

                    if (response.status == 1) {
                        $('#addRoomModal').modal('hide');
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
