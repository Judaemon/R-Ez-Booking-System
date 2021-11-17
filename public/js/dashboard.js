
$(function () {
    console.log("dashboard js");
    getRentalTable();
});

function getRentalTable(page) {
    $.ajax({
        type: 'GET',
        url: 'getUserCount',
        success: function (response) {
            // console.log(response.userCount[0].userCount);
            genAccountList(response.userCount);
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

function genAccountList(accountArray) {
    let htmlCode = ""
    accountArray.forEach(account => {
        htmlCode += `<div class="col-4">
                        <h5>`+account.account_type+`</h5>
                        <h1>`+account.userCount+`</h1>
                    </div>`
        
        // console.log(account.account_type);
        // console.log(account.userCount);
        
    });

    $('#accountContainer').html(htmlCode);

}

function renderChart(roomArray) {
    //select count(*),room_type from rooms group by room_type;
}