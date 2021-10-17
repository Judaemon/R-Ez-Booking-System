const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

$(function () {
    console.log("Customer loaded");
    fetchBookingData();
});

let rooms = [];
let rentals = [];

function fetchBookingData() {
    $.ajax({
        type: "GET",
        url: "getBookingData",
        success: function (response) {
            console.log("Booking data fetched");
            rooms = response.rooms
            rentals = response.rentals
            
        },
        error: function () {
            errorNotif();
        },
    });
}

function errorNotif() {
    swalWithBootstrapButtons.fire(
        'Error! ',
        'Something went wrong! Please try agan later.',
        'error'
    )
}

function roomList() {
    let roomListHTML = ""
    rooms.forEach(room => {
        
    });
}