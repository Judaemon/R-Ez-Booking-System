const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

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
    console.log("Working table function");
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