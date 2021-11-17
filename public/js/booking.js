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
    let checkIn = $('#start').val();
    let checkOut = $('#end').val();

    $.ajax({
        type: "POST",
        url: "getAvailableRooms",
        data: {
            checkIn: checkIn,
            checkOut: checkOut
        },
        success: function (response) {
            // $('#roomsContainer').html(response);
            console.log(response);
        },
        error: function (response) {
            console.log(response);

            // $('#roomsContainer').html(response);
            errorNotif();
        },
    });
}

// function fetchAvailableRentals() {
//     let checkIn = $('#start').val();
//     let checkOut = $('#end').val();

//     $.ajax({
//         type: "POST",
//         url: "getAvailableRentals",
//         data: {
//             checkIn: checkIn,
//             checkOut: checkOut
//         },
//         success: function (response) {
//             $('#rentalContainer').html(response);
//         },
//         error: function () {
//             errorNotif();
//         },
//     });
// }

$(document).on('change', '#start', function (event) {
    const checkIn = $('#start').val();

    if (new Date(checkIn) > new Date($('#end').val()) || !$('#end').val()) {
        $('#end').val(checkIn);
    }

    setMinDate("end", checkIn)
    
    if (SelectedRoomList != [] || SelectedRentalList != []) {
        SelectedRoomList = []
        SelectedRentalList = []

        updateRentalList()
        updateBookedRoomList()
    }

    fetchAvailableRooms()
    // fetchAvailableRentals()

})

$(document).on('change', '#end', function (event) {
    // console.log($('#start').val());
    if ($('#start').val()) {
        fetchAvailableRooms()
        // fetchAvailableRentals()
    }
})

let SelectedRoomList = new Array
let SelectedRentalList = new Array

$(document).on('click', '.selectRoomBtn', function (event) {
    let room_id = $(this).attr('room_id')
    let room_name = $(this).attr('room_name')
    
    if ($.inArray(room_id, $.map(SelectedRoomList, function(v) { return v[0]; })) > -1) {
        swalWithBootstrapButtons.fire(
            'Error! ',
            'Already Selected!',
            'error'
        )
    }else{
        SelectedRoomList.push([room_id, room_name]);
    }

    updateBookedRoomList()
})

$(document).on('click', '.removeRoomBtn', function (event) {
    let room_id = $(this).attr('room_id')
    
    // removes item sa array
    SelectedRoomList = removeItemFromArray(SelectedRoomList, room_id)

    updateBookedRoomList()
})

$(document).on('click', '.removeRentalBtn', function (event) {
    let rental_id = $(this).attr('rental_id')
    
    // removes item sa array
    console.log(rental_id);
    SelectedRentalList = removeItemFromArray(SelectedRentalList, rental_id)
    console.log(SelectedRentalList);

    updateRentalList()
})

function removeItemFromArray(array, item_id) {
    return array.filter(function(item){ return item[0] != item_id }) 
}


function updateBookedRoomList() {
    let htmlCode = ""

    $.each(SelectedRoomList, function(key1, value1) {
        htmlCode += `<div class="form-group col-12 d-flex justify-content-between my-1">
        <input id="room_id`+value1[0]+`" type="text" class="m-0 form-control" name="room_id"`+value1[0]+`
            placeholder="0" value="`+value1[1]+`">
        <a href="#viewingRental" room_id="`+value1[0]+`" room_name="`+value1[1]+`" class="btn btn-danger w-25 removeRoomBtn">Remove</a>
    </div>`
    });

    if (SelectedRoomList === undefined || SelectedRoomList.length == 0)  {
        htmlCode = `<div id="bookedRoomsContainer">
                        <div class="form-group col-12 d-flex justify-content-between my-1 text-center">
                            <p class="m-0 form-control p-2"> No rooms booked </p>
                        </div>
                    </div>`
    }

    $('#bookedRoomsContainer').html(htmlCode);
}

$(document).on('click', '.selectRentalBtn', function (event) {
    let rental_id = $(this).attr('rental_id')
    let rental_name = $(this).attr('rental_name')
    
    if ($.inArray(rental_id, $.map(SelectedRentalList, function(v) { return v[0]; })) > -1) {
        swalWithBootstrapButtons.fire(
            'Error! ',
            'Already Selected!',
            'error'
        )
    }else{
        SelectedRentalList.push([rental_id, rental_name]);
    }

    console.log(SelectedRentalList);

    updateRentalList()
})

function updateRentalList() {
    let htmlCode = ""

    $.each(SelectedRentalList, function(key1, value1) {
        htmlCode += `<div class="form-group col-12 d-flex justify-content-between my-1">
                        <input id="rental_id`+value1[0]+`" type="text" class="m-0 form-control" name="room_id"`+value1[0]+`
                            placeholder="0" value="`+value1[1]+`">
                        <a href="#viewingRental" rental_id="`+value1[0]+`" rental_name="`+value1[1]+`" class="btn btn-danger w-25 removeRentalBtn">Remove</a>
                    </div>`
    });
    
    if (SelectedRentalList === undefined || SelectedRentalList.length == 0)  {

        htmlCode = `<div id="reservedRentalContainer">
                        <div class="form-group col-12 d-flex justify-content-between my-1 text-center">
                            <p class="m-0 form-control p-2"> No rentals reserved </p>
                        </div>
                    </div>`
    }

    $('#reservedRentalContainer').html(htmlCode);
}