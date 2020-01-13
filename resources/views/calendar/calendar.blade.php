@section('calendar')
  <link href="{{asset('assets/plugins/calendar/core/main.css')}}"     rel='stylesheet' />
  <link href="{{asset('assets/plugins/calendar/daygrid/main.css')}}"  rel='stylesheet' />
  <link href="{{asset('assets/plugins/calendar/timegrid/main.css')}}" rel='stylesheet' />
  <link href="{{asset('assets/plugins/calendar/list/main.css')}}"     rel='stylesheet' />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/plugins/datepicker/css/bootstrap-datetimepicker.min.css')}}">
  <script src="{{asset('assets/plugins/calendar/core/main.js')}}"></script>
  <script src="{{asset('assets/plugins/calendar/core/locales-all.js')}}"></script>
  <script src="{{asset('assets/plugins/calendar/interaction/main.js')}}"></script>
  <script src="{{asset('assets/plugins/calendar/daygrid/main.js')}}"></script>
  <script src="{{asset('assets/plugins/calendar/timegrid/main.js')}}"></script>
  <script src="{{asset('assets/plugins/calendar/list/main.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/admin/plugins/datepicker/js/locales/bootstrap-datetimepicker.ru.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/admin/plugins/datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/admin/plugins/moment/moment.min.js')}}"></script>
@endsection
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'ru';
    var localeSelectorEl = document.getElementById('locale-selector');
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      defaultDate: <?php echo json_encode(date('Y-m-d'));?>,
      locale: initialLocaleCode,
      buttonIcons: true, // show the prev/next text
      weekNumbers: true,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      <?php if(isset($data)): ?>
        events:[
          <?php foreach ($data as $key => $value): ?>
            {
               id: <?php echo json_encode($value['id'])?>,
               title: <?php echo json_encode($value['title'])?>,
               start: <?php echo json_encode($value['start'])?>,
               end: <?php echo json_encode($value['end'])?>
            },
          <?php endforeach ?>
        ]
      <?php endif ?>
    });
    calendar.render();
  });
</script>
<div id='calendar'></div>
<script src="{{ asset('assets/js/scripts-calendar.js') }}"></script>

