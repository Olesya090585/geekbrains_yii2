<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <meta charset='utf-8' />-->
    <link href='/packages/core/main.css' rel='stylesheet' />
    <link href='/packages/daygrid/main.css' rel='stylesheet' />
    <link href='/packages/timegrid/main.css' rel='stylesheet' />
    <link href='/packages/list/main.css' rel='stylesheet' />
    <script src='/packages/core/main.js'></script>
    <script src='/packages/interaction/main.js'></script>
    <script src='/packages/daygrid/main.js'></script>
    <script src='/packages/timegrid/main.js'></script>
    <script src='/packages/list/main.js'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
                height: 'parent',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                defaultView: 'dayGridMonth',
                defaultDate: '<?php echo date('Y-m-d'); ?>',
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    <?php foreach ($myEvents as $my_event) {
                        $title = $my_event->title;
                        $starts = date('Y-m-d\TH:i:s', strtotime($my_event->starts));
                        $ends = date('Y-m-d\TH:i:s', strtotime($my_event->ends));
                        echo "{\n title: " . "'" . $title . "'" . ",\n"
                        . " " . "start: " . "'" . $starts . "'" . ",\n"
                        . " " . "end: " . "'" . $ends . "'" . " \n},\n";
                } ?>
                ]
            });

            calendar.render();
        });

    </script>
    <style>

        html, body {
            overflow: hidden; /* don't do scrollbars */
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .fc-header-toolbar {
            /*
            the calendar will be butting up against the edges,
            but let's scoot in the header's buttons
            */
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
        }

    </style>
<!--</head>-->
<!--<body>-->

<div id='calendar-container'>
    <div id='calendar'></div>
</div>

<!--</body>-->
<!--</html>-->
