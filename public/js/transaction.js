const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

$(function () {
    console.log("transaction loaded");
    setMinDateToToday("start");
    setMinDateToToday("end");
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function setMinDateToToday(inputDateID) {
    const dateToday = new Date().toJSON().slice(0, 10).replace(/-/g, '-');

    $("#" + inputDateID).attr("min", dateToday);
}

function setMinDate(inputDateID, date) {
    $("#" + inputDateID).attr("min", date);
}

function errorNotif() {
    swalWithBootstrapButtons.fire(
        'Error! ',
        'Something went wrong! Please try agan later.',
        'error'
    )
}

function fetchAvailableRooms() {
    const checkIn = $('#start').val();
    const checkOut = $('#end').val();

    $.ajax({
        type: "POST",
        url: "getAvailableRooms",
        data: {
            checkIn: checkIn,
            checkOut: checkOut
        },
        success: function (response) {
            $('#roomsContainer').html(response);

            // console.log(rooms);
            // rentals = response.rentals
        },
        error: function () {
            errorNotif();
        },
    });
}

$(document).on('change', '#start', function (event) {
    const checkIn = $('#start').val();

    $('#end').val(checkIn);

    setMinDate("end", checkIn)

    fetchAvailableRooms()

})

$(document).on('change', '#end', function (event) {
    fetchAvailableRooms()
})
