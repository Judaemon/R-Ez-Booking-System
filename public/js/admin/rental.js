const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

$(function () {
    console.log("rental loaded");
    getRentalTable();
});

function getRentalTable(page) {
    $.ajax({
        type: 'GET',
        url: 'showAllRental?page=' + page,
        success: function (response) {
            $('#rentalTable').html(response);
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
$(document).on('submit', '.deleteRental', function (event) {
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
                  if (response.code == 0) {
                    errorWarning();
                } else {
                    getRentalTable();

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
$('#addRentalForm').on('submit', function (event) {
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
            const form = this;

            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                type: 'POST',
                dataType: 'JSON',
                data: new FormData(form),
                processData: false,
                contentType: false,
                beforeSend: function () {
                    clearErrorText('addRentalForm');
                },
                success: function (response) {
                    if (response.status == 0) {
                        $.each(response.error, function (prefix, val) {
                            $('#addRentalForm #input_' + prefix).addClass('is-invalid')
                            $('#addRentalForm span.' + prefix + '_error').text(val)
                        })
                    }

                    if (response.status == 1) {
                        $('#addRentalModal').modal('hide');
                        getRentalTable();

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
