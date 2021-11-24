const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

$(function () {
    //console.log("Booking loaded");
    setMinDateToToday();
    updateTotalPrice()
});

function clearErrorText(formID) {
    $('#' + formID + ' input').removeClass('is-invalid')
    $('#' + formID + ' select').removeClass('is-invalid')
    $(document).find('#' + formID + ' span.error-text').text('');
}

// need to if walang form naginagamit
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function setMinDateToToday() {
    const dateToday = new Date().toJSON().slice(0, 10).replace(/-/g, '-');

    $("#input_start").attr("min", dateToday);
    $("#input_start").val(dateToday);

    setMinDateCheckOut(dateToday)
    console.log("wadscs");
}

function setMinDateCheckOut(date) {
    $("#input_end").attr("min", date);
}

function errorNotif() {
    swalWithBootstrapButtons.fire(
        'Error! ',
        'Something went wrong! Please try agan later.',
        'error'
    )
}

function fetchAvailableRooms() {
    const checkIn = $('#input_start').val();
    const checkOut = $('#input_end').val();

    $.ajax({
        type: "POST",
        url: "getAvailableRooms",
        data: {
            checkIn: checkIn,
            checkOut: checkOut
        },
        success: function (response) {
            // console.log("fetched rooms");
            //console.log(response);
            $('#roomsContainer').html(response);
        },
        error: function (response) {
            //console.log(response);
            errorNotif();
        },
    });
}

function fetchAvailableRentals() {
    const checkIn = $('#input_start').val();
    const checkOut = $('#input_end').val();

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
            //(response);
            errorNotif();
        },
    });
}

// --------------------------------Start
$(document).on('change', '#input_start', function (event) {
    const checkIn = $('#input_start').val();

    if (new Date(checkIn) > new Date($('#input_end').val()) || !$('#input_end').val()) {
        $('#input_end').val(checkIn);
    }

    setMinDateCheckOut(checkIn)
    
    resetBookList()
})

function resetBookList() {
    SelectedRoomList = []
    SelectedRentalList = []

    totalPrice = 0
    totalPrice = childPrice + AdultPrice
    updateTotalPrice()
    
    updateBookedRoomList()
    updateBookedRentalList()
}

// --------------------------------End
$(document).on('change', '#input_end', function (event) {
    //console.log('Update:' + $('#start').val());
    if ($('#input_start').val()) {
        fetchAvailableRooms()
        fetchAvailableRentals()
    }
    
    resetBookList()
})

// ----------------------------------clicks
let SelectedRoomList = new Array
let SelectedRentalList = new Array

let totalPrice = 100

// add room
$(document).on('click', '.selectRoomBtn', function (event) {
    let room_id = $(this).attr('room_id')
    let room_type = $(this).attr('room_type')
    let room_price = $(this).attr('room_price')
    let count = updateBookedRoomItem(room_id)
    
    //console.log("id:" + room_id +" | room_type: " + room_type + " | count: "+ count + " | count: "+ room_price);

    totalPrice+= parseInt(room_price)

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
        SelectedRoomList.push([room_id, room_type, 1, parseInt(room_price)]);
    }

    updateTotalPrice()

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
    let price = $(this).attr('room_price')
 
    SelectedRoomList.forEach(room => {
        //console.log(room[2]); 
        if(room[0] == room_id && room[2] == 1){
            SelectedRoomList = removeItemFromArray(SelectedRoomList, room_id)
        }

        if (room[0] == room_id && room[2] > 1) {
            room[2]--
        }
    });

    //(price);
    totalPrice -= price
    updateTotalPrice()

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
        <input id="room_id`+value1[0]+`" rental_price="`+value1[3]+`" type="text" class="m-0 form-control" readonly 
            value="`+value1[1]+`">

        <input name="room_id[]" type="text" hidden class="m-0 form-control" 
        value="`+value1[0]+`">
        
        <a href="#viewingRental" room_id="`+value1[0]+`" room_name="`+value1[1]+`" room_price="`+value1[3]+`" class="btn btn-danger w-25 removeRoomBtn">Remove 1 of  `+value1[2]+`</a>
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

// add rental
$(document).on('click', '.selectRentalBtn', function (event) {
    let rental_id = $(this).attr('rental_id')
    let rental_type = $(this).attr('rental_type')
    let rental_price = $(this).attr('rental_price')
    let count = updateBookedRentalItem(rental_id)

    // console.log("id:" + rental_id +" | room_type: " + rental_type + " | count: "+ count + " | price: "+ rental_price);
    
    totalPrice+= parseInt(rental_price)

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
        SelectedRentalList.push([rental_id, rental_type, 1, parseInt(rental_price)]);
    }

    //console.log(totalPrice);
    updateTotalPrice()

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
                        <input id="rental_id`+value1[0]+`" type="text" class="m-0 form-control" readonly "
                            placeholder="0" value="`+value1[1]+`">

                        <input type="text" class="m-0 form-control" hidden name="rental_id[]"
                        placeholder="0" value="`+value1[0]+`">
                        <a href="#viewingRental" rental_price="`+value1[3]+`" rental_id="`+value1[0]+`" rental_name="`+value1[1]+`" class="btn btn-danger w-25 removeRentalBtn">Remove 1 of `+value1[2]+`</a>
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

// remove rental
$(document).on('click', '.removeRentalBtn', function (event) {
    let rental_id = $(this).attr('rental_id')
    let price = $(this).attr('rental_price')

    SelectedRentalList.forEach(rental => {
        //console.log(rental[2]); 
        if(rental[0] == rental_id && rental[2] == 1){
            price = rental[3]
            SelectedRentalList = removeItemFromArray(SelectedRentalList, rental_id)
        }
    
        if (rental[0] == rental_id && rental[2] > 1) {
            rental[2]--
            price = rental[3]
            //console.log(rental[2]);
        }

    });
    
    totalPrice -= price
    updateTotalPrice()

    updateAvailableRentalItem(rental_id)

    updateBookedRentalList()
})

function updateTotalPrice() {
    $("#total_price").val(totalPrice)
}


$('#addBookingForm').on('submit', function (event) {
    event.preventDefault();
    console.log("test buton");

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This Booking information will be added from the database!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Add it!',
        cancelButtonText: 'No, Cancel!',
        reverseButtons: true

    }).then((result) => {
        if (result.isConfirmed) {
            //console.log("Checking Add Form");
            const form = this;
            // console.log(form);
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                type: 'POST',
                dataType: 'JSON',
                data: new FormData(form),
                processData: false,
                contentType: false,
                beforeSend: function () {
                    clearErrorText('addBookingForm');
                },
                success: function (response) {
                    //console.log(response);
                    if (response.status == 0) {
                        console.log(response);
                        $.each(response.error, function (prefix, val) {
                            if (prefix == "room_id") {
                                swalWithBootstrapButtons.fire(
                                    'Invalid!',
                                    "You need at least 1 room to be able to book",
                                    'error'
                                )
                            }
                            $('#addBookingForm #input_' + prefix).addClass('is-invalid')
                            $('#addBookingForm span.' + prefix + '_error').text(val)
                        })
                    }

                    if (response.status == 1) {
                        $(form)[0].reset();
                        swalWithBootstrapButtons.fire(
                            'Successful!',
                            response.msg,
                            'success'
                        )

                        resetBookList()
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

// adult and child input -----------------------------------------
let AdultPrice = 100
let childPrice = 0

$('#input_children').on('keyup', function (event) {
    totalPrice -=childPrice

    childPrice = $(this).val() * 75
  
    totalPrice += childPrice

    updateTotalPrice()
})

$('#input_adult').on('keyup', function (event) {
    totalPrice -= AdultPrice

    AdultPrice = $(this).val() * 100
  
    totalPrice += AdultPrice

    updateTotalPrice()
})