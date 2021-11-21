const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

let imageInputArray = [0]

$(function () {
    getRentalTable();
});

//////////////////////////////////////////////

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

///////////////////////////////////////////////
function getRentalTable(page) {
    $.ajax({
        type: 'GET',
        url: 'showAllRental',
        success: function (response) {
            //console.log(response);
            //console.log("Rental Table Loaded");
            $('#rentalTableContainer').html(response);
            $("#rentalTable").DataTable({
                language: {
                    search: '',
                    searchPlaceholder: "Search..."
                },
                dom: "<'row mb-3'<'col-md-6'f><'col-md-6' <'RentalAddBtn'>>>" +
                    "<'row'<'col-md-6'l><'col-md-6'i>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-md-12'p>>",
            });
            addBtnRentalTable();
        },
        error: function () {
            errorNotif();
        },
    });
}

function addBtnRentalTable() {
    const html = `<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRentalModal" style="width: 100%;">Add Rental</button>`;
    $(".RentalAddBtn").html(html);
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

// Delete Ajax
// $(document).on('submit', '.deleteRental', function (event) {
//     event.preventDefault();
//     swalWithBootstrapButtons.fire({
//         title: 'Are you sure?',
//         text: "This Rental information will be delete from the database!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes, Delete it!',
//         cancelButtonText: 'No, Cancel!',
//         reverseButtons: true

//     }).then((result) => {
//         if (result.isConfirmed) {
//             const form = this;

//             $.ajax({
//                 url: $(form).attr('action'),
//                 method: $(form).attr('method'),
//                 type: 'DELETE',
//                 dataType: 'JSON',
//                 data: new FormData(form),
//                 processData: false,
//                 contentType: false,
//                 success: function (response) {
//                   if (response.code == 0) {
//                     errorWarning();
//                 } else {
//                     getRentalTable();

//                     swalWithBootstrapButtons.fire(
//                         'Successful!',
//                         response.msg,
//                         'success'
//                     )
//                 }
//                 }

//             });
//         } else if (
//             result.dismiss === Swal.DismissReason.cancel // click ayaw
//         ) {
//             swalWithBootstrapButtons.fire(
//                 'Cancelled',
//                 'Lets pretend that never happend >:)',
//                 'error'
//             )
//         }
//     })
// });

//Add Ajax
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

// Display Edit Form
$(document).on('click', '#rentalUpdateBtn', function (event) {
    const id = ($(this).attr('room_id'));
    const form = this;
    $.ajax({
        method: 'GET',
        url: 'rental/' + id + '/edit/',
        processData: false,
        contentType: false,
        success: function (response) {
            //console.log(response);
            $('#editRentalForm').html(response);
        },
    });
});

// Update Ajax
$(document).on('submit', '#updateRentalForm', function (event) {
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
                    //console.log(response);
                //     $('#updateRentalModal').modal('hide');
                //     getRentalTable();
                // },
                beforeSend: function () {
                    clearErrorText('updateRentalForm');
                },
                success: function (response) {
                    if (response.status == 0) {
                        $.each(response.error, function (prefix, val) {
                            $('#updateRentalForm #input_' + prefix).addClass('is-invalid')
                            $('#updateRentalForm span.' + prefix + '_error').text(val)
                        })
                    }

                    if (response.status == 1) {
                        $('#updateRentalModal').modal('hide');
                        getRentalTable();
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

           