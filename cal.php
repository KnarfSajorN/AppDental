<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.1/core/main.min.css" integrity="sha512-sLe3xBqvQ/g6tG5NbanpA3wrcvvXe7BG89OZJcDUtv/uUPYti8yaJaIgmOJmxlP0RDM29EFr2S9XyOQBua5jQQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.1/daygrid/main.min.css" integrity="sha512-eUkG6SyY2M0OKuCLStqsb2zh28fEuZ/2X4TLbHckIWTshxcG/9JG251HBGHvW2zS8LpsR3jdOFw43OnWrRDcGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.1/core/main.min.js" integrity="sha512-RxCKBWERQkr5xhNIfhhDfMpJk+h6JHeNAOIeopJSc0z/9CR9yccDtHEkdhO20XsX8J0CJufcs7KwhSMvoK8t5g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.1/daygrid/main.min.js" integrity="sha512-qa7j0OEQOhk6I1yOeZarvP3su1WgDFak30FqN+w+DNrJDpNSt6MQl+uCJ4c/+P/AKEN7HP0YmNmEV6gGzx8Pdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.1/google-calendar/main.min.js" integrity="sha512-YfRh25gcv4nVR/hcnG+AaA+YGkKQJ3WNOEz5ojoN0CCaeOp8bBBBI/Aq/4Nkn5nTkL1atfxNBad1edG7sSMmxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.0.1/interaction/main.min.js" integrity="sha512-Vfm/nu9YZPaTa+tQLo+0MiaqqlJRYiS+T+71qKjufPDJqs0ZvhwjgJOKh/gSQrB2i/YIgraIkd+AcfbBb1cPwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type='text/javascript'>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            googleCalendarApiKey: '636515119537-qv31v9uah5ncnpj8f5481d0jstkt6fce.apps.googleusercontent.com',
            eventSources: [{
                    googleCalendarId: 'https://calendar.google.com/calendar/u/0?cid=ZGV2aGVsbG9tZWRpY2FsQGdtYWlsLmNvbQ'
                },
                {
                    googleCalendarId: 'https://calendar.google.com/calendar/u/0?cid=ZGV2aGVsbG9tZWRpY2FsQGdtYWlsLmNvbQ',
                    className: 'nice-event'
                }
            ]
        });

        calendar.render();
    });
</script>