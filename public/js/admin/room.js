const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

let imageInputArray = [0]
let amenitiesInputArray = [0]
let amenitiesItemArray = []

$(function () {
    getAmenities();
    getRoomTable();
});

// Add Amenities
$(document).on('click', '#addAmenitiesBtn', function (event) {
    amenitiesInputArray.push((amenitiesInputArray.length))
    addAmenitiesInput()
});

$(document).on('click', '.removeAmenitiesInputBtn', function (event) {
    const inputContainer = $(this).attr('inputContainer')
    const inputContainerID = $(this).attr('inputContainerID')

    amenitiesInputArray.splice( $.inArray(inputContainerID, amenitiesInputArray), 1 );

    $("#"+inputContainer).remove();
});

function addAmenitiesInput() {
    const latestInputAmenitiesID = amenitiesInputArray[amenitiesInputArray.length-1]

    $(amenitiesInput(latestInputAmenitiesID)).insertAfter("#amenitiesInput"+(latestInputAmenitiesID-1));
}

function amenitiesInput(id) {
    let amenitiesInputHTML = 
    `<div class="row mt-2" id="amenitiesInput`+id+`">
        <div class="col-9">
        <select class="form-select" id="input_amenities[]" name="amenities[]" placeholder="Amenities">
        <option value="">Click to open Menu</option>
            `
                amenitiesItemArray.forEach(amenities => {
                    amenitiesInputHTML += `<option value="`+amenities+`">`+amenities+`</option>`
                    
                });
                amenitiesInputHTML += `
        </select>
        </div>
        <div class="col-3">
            <button class="btn btn-danger w-100 removeAmenitiesInputBtn" inputContainer="amenitiesInput`+id+`" inputContainerID=`+id+` type="button">Remove</button>     
        </div>
    </div>`
    return amenitiesInputHTML
}


// Add Image
$(document).on('click', '#addImageBtn', function (event) {
    imageInputArray.push((imageInputArray.length))
    addImageInput()
});

$(document).on('click', '.removeImageInputBtn', function (event) {
    const inputContainer = $(this).attr('inputContainer')
    const inputContainerID = $(this).attr('inputContainerID')

    imageInputArray.splice( $.inArray(inputContainerID, imageInputArray), 1 );

    $("#"+inputContainer).remove();
});

function addImageInput() {
    const latestInputImageID = imageInputArray[imageInputArray.length-1]

    $(imageInput(latestInputImageID)).insertAfter("#imageInput"+(latestInputImageID-1));
}

function imageInput(id) {
    const imageInputHTML = 
    `<div class="row mt-2" id="imageInput`+id+`">
        <div class="col-9">
            <input type="file" name="image_paths[]" class="form-control" accept="image/png, image/gif, image/jpeg" required>
        </div>
        <div class="col-3">
            <button class="btn btn-danger w-100 removeImageInputBtn" inputContainer="imageInput`+id+`" inputContainerID=`+id+` type="button">Remove</button>     
        </div>
    </div>`

    return imageInputHTML
}

function getRoomTable(page) {
    $.ajax({
        type: 'GET',
        url: 'showAllRoom',
        success: function (response) {
            //console.log(response);
            //console.log("Room Table Loaded");
            $('#roomTableContainer').html(response);
            $("#roomTable").DataTable({
                language: {
                    search: '',
                    searchPlaceholder: "Search..."
                },
                dom: "<'row mb-3'<'col-md-6'f><'col-md-6' <'RoomAddBtn'>>>" +
                    "<'row'<'col-md-6'l><'col-md-6'i>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-md-12'p>>",
            });
            addBtnRoomTable();
        },
        error: function () {
            errorNotif();
        },
    });
}

function getAmenities() {
    $.ajax({
        type: 'GET',
        url: 'getAmenities',
        success: function (response) {
            //console.log(response.message);
            amenitiesItemArray = response.message
            
        },
        error: function () {
            errorNotif();
        },
    });
}

function addBtnRoomTable() {
    const html = `<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal" style="width: 100%;">Add Room</button>`;
    $(".RoomAddBtn").html(html);
}

function errorNotif() {
    swalWithBootstrapButtons.fire(
        'Error! ',
        'Something went wrong! Please try agan later.',
        'error'
    )
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
$(document).on('click', '#roomUpdateBtn', function (event) {
    const id = ($(this).attr('room_id'));
    //console.log(id);
    const form = this;
    $.ajax({
        method: 'GET',
        url: 'room/' + id + '/edit/',
        processData: false,
        contentType: false,
        success: function (response) {
            //console.log(response);
            $('#editRoomForm').html(response);
        },
    });
});

// Update Ajax
$(document).on('submit', '#updateRoomForm', function (event) {
    event.preventDefault();
    //console.log("update btn test");
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This Room information will be updated from the database!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Update it!',
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
                // success: function (response) {
                //     //console.log(response);
                //     $('#updateRoomModal').modal('hide');
                //     getRoomTable();
                // },
                beforeSend: function () {
                    clearErrorText('updateRoomForm');
                },
                success: function (response) {
                    if (response.status == 0) {
                        $.each(response.error, function (prefix, val) {
                            $('#updateRoomForm #input_' + prefix).addClass('is-invalid')
                            $('#updateRoomForm span.' + prefix + '_error').text(val)
                        })
                    }

                    if (response.status == 1) {
                        $('#updateRoomModal').modal('hide');
                        getRoomTable();
                        $(form)[0].reset();

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

// Delete Ajax
$(document).on('submit', '.deleteRoom', function (event) {
    event.preventDefault();
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This Room information will be delete from the database!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, Cancel!',
        reverseButtons: true

    }).then((result) => {
        if (result.isConfirmed) {
            //console.log("Checking Delete Form");
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
                        getRoomTable();

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
        text: "This Room information will be added from the database!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Add it!',
        cancelButtonText: 'No, Cancel!',
        reverseButtons: true

    }).then((result) => {
        if (result.isConfirmed) {
            //console.log("Checking Add Form");
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
                    clearErrorText('addRoomForm');
                },
                success: function (response) {
                    //console.log(response);
                    if (response.status == 0) {
                        $.each(response.error, function (prefix, val) {
                            $('#addRoomForm #input_' + prefix).addClass('is-invalid')
                            $('#addRoomForm span.' + prefix + '_error').text(val)
                        })
                    }

                    if (response.status == 1) {
                        $('#addRoomModal').modal('hide');
                        getRoomTable();
                        $(form)[0].reset();
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
