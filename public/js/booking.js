const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

$(function () {
    console.log("Booking loaded");
    setMinDateToToday();
});

// need to if walang form naginagamit
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function setMinDateToToday() {
    const dateToday = new Date().toJSON().slice(0, 10).replace(/-/g, '-');

    $("#start").attr("min", dateToday);
    $("#start").val(dateToday);

    setMinDateCheckOut(dateToday)
}

function setMinDateCheckOut(date) {
    $("#end").attr("min", date);

        // if ($("#end").val()) {
        //     console.log("wew");   
        // }else{
        //     console.log("lol");   
        // }
    ;
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
            // console.log("fetched rooms");
            console.log(response);
            $('#roomsContainer').html(response);
        },
        error: function (response) {
            console.log(response);
            errorNotif();
        },
    });
}

function fetchAvailableRentals() {
    const checkIn = $('#start').val();
    const checkOut = $('#end').val();

    $.ajax({
        type: "POST",
        url: "getAvailableRentals",
        data: {
            checkIn: checkIn,
            checkOut: checkOut
        },
        success: function (response) {
            // console.log("fetched rooms");
            // console.log(response);
            $('#rentalContainer').html(response);
        },
        error: function (response) {
            console.log(response);
            errorNotif();
        },
    });
}

// --------------------------------Start
$(document).on('change', '#start', function (event) {
    const checkIn = $('#start').val();

    if (new Date(checkIn) > new Date($('#end').val()) || !$('#end').val()) {
        $('#end').val(checkIn);
    }

    setMinDateCheckOut(checkIn)
    
    resetBookList()

    fetchAvailableRooms()
    fetchAvailableRentals()
})

function resetBookList() {
    SelectedRoomList = []
    SelectedRentalList = []

    updateBookedRoomList()
}

// --------------------------------End
$(document).on('change', '#end', function (event) {
    console.log('Update:' + $('#start').val());
    if ($('#start').val()) {
        fetchAvailableRooms()
        fetchAvailableRentals()
    }
})

// ----------------------------------clicks
let SelectedRoomList = new Array
let SelectedRentalList = new Array

$(document).on('click', '.selectRoomBtn', function (event) {
    let room_id = $(this).attr('room_id')
    let room_type = $(this).attr('room_type')
    let count = updateBookedRoomItem(room_id)
    
    console.log("id:" + room_id +" | room_type: " + room_type + " | count: "+ count);

    if (count <= 0) {
        $(this).addClass("disabled")
    }

    if ($.inArray(room_id, $.map(SelectedRoomList, function(v) { return v[0]; })) > -1) {
        SelectedRoomList.forEach(room => {
            if (room[0] == room_id) {
                room[2]++
            }
        });
    }else{
        SelectedRoomList.push([room_id, room_type, 1]);
    }

    updateBookedRoomList()
})

function updateBookedRoomItem(id) {
    const elementcounter = $('#availableRoomCount'+id) 

    elementcounter.attr('count', elementcounter.attr('count') - 1)
    elementcounter.html(elementcounter.attr('count'));

    updateBookedRoomList()

    return elementcounter.attr('count')
}

$(document).on('click', '.removeRoomBtn', function (event) {
    let room_id = $(this).attr('room_id')
    
    SelectedRoomList.forEach(room => {
        console.log(room[2]); 
        if(room[0] == room_id && room[2] == 1){
            SelectedRoomList = removeItemFromArray(SelectedRoomList, room_id)
        }

        if (room[0] == room_id && room[2] > 1) {
            room[2]--
            console.log(room[2]);
        }
        
    });

    updateAvailableRoomItem(room_id)

    updateBookedRoomList()
})

function removeItemFromArray(array, item_id) {
    return array.filter(function(item){ return item[0] != item_id }) 
}

function updateAvailableRoomItem(id) {
    const elementcounter = $('#availableRoomCount'+id) 
    
    elementcounter.attr('count', parseInt(elementcounter.attr('count')) + 1)
    elementcounter.html(elementcounter.attr('count'));

    $("#addRoom"+id).removeClass("disabled")
}

function updateBookedRoomList() {
    let htmlCode = ""

    $.each(SelectedRoomList, function(key1, value1) {
        htmlCode += `<div class="form-group col-12 d-flex justify-content-between my-1">
        <input id="room_id`+value1[0]+`" type="text" class="m-0 form-control""
            value="`+value1[1]+`">

        <input id="room_id`+value1[0]+`" type="text" hidden class=" m-0 form-control" name="room_id[]"
            value="`+value1[0]+`">
        <a href="#viewingRental" room_id="`+value1[0]+`" room_name="`+value1[1]+`" class="btn btn-danger w-25 removeRoomBtn">Remove 1 of  `+value1[2]+`</a>
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
    let rental_type = $(this).attr('rental_type')
    let count = updateBookedRentalItem(rental_id)

    console.log("id:" + rental_id +" | room_type: " + rental_type + " | count: "+ count);
    
    console.log("#addRental" + rental_id);

    if (count <= 0) {
        $(this).addClass("disabled")
    }

    if ($.inArray(rental_id, $.map(SelectedRentalList, function(v) { return v[0]; })) > -1) {
        SelectedRentalList.forEach(rental => {
            if (rental[0] == rental_id) {
                rental[2]++
            }
        });
    }else{
        SelectedRentalList.push([rental_id, rental_type, 1]);
    }

    updateBookedRentalList()
})

function updateBookedRentalItem(id) {
    const elementcounter = $('#availableRentalCount'+id) 

    elementcounter.attr('count', elementcounter.attr('count') - 1)
    elementcounter.html(elementcounter.attr('count'));

    updateBookedRentalList()

    return elementcounter.attr('count')
}

function updateBookedRentalList() {
    let htmlCode = ""

    $.each(SelectedRentalList, function(key1, value1) {
        htmlCode += `<div class="form-group col-12 d-flex justify-content-between my-1">
                        <input id="rental_id`+value1[0]+`" type="text" class="m-0 form-control" name="room_id"`+value1[0]+`
                            placeholder="0" value="`+value1[1]+`">
                        <a href="#viewingRental" rental_id="`+value1[0]+`" rental_name="`+value1[1]+`" class="btn btn-danger w-25 removeRentalBtn">Remove 1 of `+value1[2]+`</a>
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

// pang add sa list ng rental pag mag reremove ng item
function updateAvailableRentalItem(id) {
    const elementcounter = $('#availableRentalCount'+id) 
    
    elementcounter.attr('count', parseInt(elementcounter.attr('count')) + 1)
    elementcounter.html(elementcounter.attr('count'));

    $("#addRental"+id).removeClass("disabled")
}

$(document).on('click', '.removeRentalBtn', function (event) {
    let rental_id = $(this).attr('rental_id')
    
    SelectedRentalList.forEach(rental => {
        console.log(rental[2]); 
        if(rental[0] == rental_id && rental[2] == 1){
            SelectedRentalList = removeItemFromArray(SelectedRentalList, rental_id)
        }
    
        if (rental[0] == rental_id && rental[2] > 1) {
            rental[2]--
            console.log(rental[2]);
        }
    });

    updateAvailableRentalItem(rental_id)

    updateBookedRentalList()
})