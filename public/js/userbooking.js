$(function () {
    getUserBookingTable();
});

function getUserBookingTable(page) {
    $.ajax({
        type: 'GET',
        url: 'getUserBookingTable',
        success: function (response) {
            //console.log(response);
            //console.log("Rental Table Loaded");
            $('#bookingTableContainer').html(response);
        },
        error: function () {
            errorNotif();
        },
    });
}