@extends('layouts.app')

@section('script')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
@endsection

<style>
    #calendar a {
        text-decoration: none !important;
    }

</style>

@section('content')
<div class="container">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: '2021-04-07',
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
                events: [{
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
            });

            calendar.render();
        });

    </script>

    <div class="container-xxl">
        <div id='calendar'></div>
    </div>

</div>
@endsection
