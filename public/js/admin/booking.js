const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

function errorWarning() {
    swalWithBootstrapButtons.fire(
        'Error! ',
        'Something went wrong! Please try agan later.',
        'error'
    )
}

function errorNotif() {
    swalWithBootstrapButtons.fire(
        'Error! ',
        'Something went wrong! Please try agan later.',
        'error'
    )
}
function addBtnBookingTable() {
    const html = `<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookingModal" style="width: 100%;">Add Booking</button>`;
    $(".BookingAddBtn").html(html);
}

$(function () {
    //console.log("Working Booking admin js");
    getBookingTable();
});

function getBookingTable(page) {
    //console.log("Working table function");
    $.ajax({
        type: 'GET',
        url: 'getBookingTable',
        success: function (response) {
            // console.log(response);
            //console.log("Rental Table Loaded");
            $('#bookingTableContainer').html(response);
            $("#bookingTable").DataTable({
                language: {
                    search: '',
                    searchPlaceholder: "Search..."
                },
                dom: "<'row mb-3'<'col-md-6'f><'col-md-6' <'BookingAddBtn'>>>" +
                    "<'row'<'col-md-6'l><'col-md-6'i>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-md-12'p>>",
            });
            addBtnBookingTable();
        },
        error: function () {
            errorNotif();
        },
    });
}

// Decline
$(document).on('submit', '#declineForm', function (event) {
    event.preventDefault();
    //console.log("update btn test");
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This reservation will be declined!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Decline it!',
        cancelButtonText: 'No, Cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const form = this;
           
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                dataType: 'JSON',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status == 1) {
                        getBookingTable();
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

// Accept
$(document).on('submit', '#acceptForm', function (event) {
    event.preventDefault();
    //console.log("update btn test");
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This reservation will be accepted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Accept it!',
        cancelButtonText: 'No, Cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                dataType: 'JSON',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status == 1) {
                        getBookingTable();
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