const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success mx-2',
        cancelButton: 'btn btn-danger mx-2'

    },
    buttonsStyling: false
});

$(function () {
    console.log("Transaction loaded");
    // const event = getEvents()
    // console.log(event);
    //fetchTransactionTable();
    renderCalendar();
});

function fetchTransactionTable() {
    
    // $.ajax({
    //     type: "GET",
    //     url: "showAllTransaction",
    //     success: function (response) {
    //         console.log(response);
    //         console.log("Transaction Table Loaded");
    //         $("#transactionTableContainer").html(response);
    //         $("#transactionTable").DataTable({
    //             language: {
    //                 search: '',
    //                 searchPlaceholder: "Search..."
    //             },
    //             dom: "<'row mb-3'<'col-md-6'f><'col-md-6' <'transactionAddBtn'>>>" +
    //                 "<'row'<'col-md-6'l><'col-md-6'i>>" +
    //                 "<'row'<'col-sm-12'tr>>" +
    //                 "<'row'<'col-md-12'p>>",
    //         });
    //         addBtnTransactionTable();
    //     },
    //     error: function () {
    //         errorNotif();
    //     },
    // });
}

function addBtnTransactionTable() {
    const html = `<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTransactionModal" style="width: 100%;">Add Transaction</button>`;
    $(".transactionAddBtn").html(html);
}

function errorNotif() {
    swalWithBootstrapButtons.fire(
        'Error! ',
        'Something went wrong! Please try agan later.',
        'error'
    )
}

let events = [{
    title: 'Judaya Reservation',
    extraParams: {
        info: 'Premuim, 5 people',
    },
    start: '2021-04-01',
    end: '2021-04-02'
},
{
    title: 'Ej Bithday Reservation',
    start: '2021-04-01',
    end: '2021-04-05'
},
{
    groupId: '999',
    title: 'Receiving Guest',
    start: '2021-04-05T06:00:00'
},
{
    groupId: '999',
    title: 'Sending Guest',
    start: '2021-04-05T07:00:00'
}]

async function getEvents() {
    let events = [{
        title: 'Judaya Reservation',
        extraParams: {
            info: 'Premuim, 5 people',
        },
        start: '2021-04-01',
        end: '2021-04-02'
    },
    {
        title: 'Ej Bithday Reservation',
        start: '2021-04-01',
        end: '2021-04-05'
    },
    {
        groupId: '999',
        title: 'Receiving Guest',
        start: '2021-04-05T06:00:00'
    },
    {
        groupId: '999',
        title: 'Sending Guest',
        start: '2021-04-05T07:00:00'
    }
]

    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'GET',
            url: 'admin/getAllTransaction',
            success: (response) => {
                //console.log("idk how this works but yeah");
                
                // events = [{
                //     title: response.Transaction[0].title
                // }]

                resolve(response);
                // resolve(events);
            },
            error: (response) => {
                console.log("lol error idk how");
                reject(response);
            }
        })
    })
}


function renderCalendar() {
    var calendarEl = document.getElementById('calendar');

    const date = new Date();
    const strDate = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: strDate,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        selectable: true,
        eventClick: function (info) {
            info.jsEvent.preventDefault();

            // console.log(info.event.extendedProps.extraParams.info);
            Swal.fire(
                info.event.title,
                'Start: ' + info.event.start + '<br>Info: ' + info.event.extendedProps
                .extraParams.info,
                'question')
        },
        events: events
        //events: "admin/getAllTransaction",

    });

    calendar.render();
}
