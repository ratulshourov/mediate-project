<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />

    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
    <!-- MDB ESSENTIAL -->
    <link rel="stylesheet" href="{{ asset('mdbootstrap/css/mdb.min.css') }}" />
    <!-- MDB PLUGINS -->
    {{-- <link rel="stylesheet" href="{{ asset('mdbootstrap/plugins/css/all.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('mdbootstrap/plugins/css/calendar.min.css') }}" /> --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <!-- MDB ESSENTIAL -->
          <!-- Scripts -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  <script type="text/javascript" src="{{ asset('mdbootstrap/js/mdb.umd.min.js') }}"></script>
  <!-- MDB PLUGINS -->
  {{-- <script type="text/javascript" src="{{ asset('mdbootstrap/plugins/js/all.min.js') }}"></script> --}}
  {{-- <script type="text/javascript" src="{{ asset('mdbootstrap/plugins/js/calendar.min.js') }}"></script> --}}
  <!-- Custom scripts -->
  {{-- <script type="text/javascript">

    const events = [
      {
        summary: 'JS Conference',
        start: {
          date: Calendar.dayjs().format('DD/MM/YYYY'),
        },
        end: {
          date: Calendar.dayjs().format('DD/MM/YYYY'),
        },
        color: {
          background: '#cfe0fc',
          foreground: '#0a47a9',
        },
      },
      {
        summary: 'Vue Meetup',
        start: {
          date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
        },
        end: {
          date: Calendar.dayjs().add(5, 'day').format('DD/MM/YYYY'),
        },
        color: {
          background: '#ebcdfe',
          foreground: '#6e02b1',
        },
      },
      {
        summary: 'Angular Meetup',
        description: 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur',
        start: {
          date: Calendar.dayjs().subtract(3, 'day').format('DD/MM/YYYY'),
          dateTime: Calendar.dayjs().subtract(3, 'day').format('DD/MM/YYYY') + ' 10:00',
        },
        end: {
          date: Calendar.dayjs().add(3, 'day').format('DD/MM/YYYY'),
          dateTime: Calendar.dayjs().add(3, 'day').format('DD/MM/YYYY') + ' 14:00',
        },
        color: {
          background: '#c7f5d9',
          foreground: '#0b4121',
        },
      },
      {
        summary: 'React Meetup',
        start: {
          date: Calendar.dayjs().add(5, 'day').format('DD/MM/YYYY'),
        },
        end: {
          date: Calendar.dayjs().add(8, 'day').format('DD/MM/YYYY'),
        },
        color: {
          background: '#fdd8de',
          foreground: '#790619',
        },
      },
      {
        summary: 'Meeting',
        start: {
          date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
          dateTime: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY') + ' 8:00',
        },
        end: {
          date: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY'),
          dateTime: Calendar.dayjs().add(1, 'day').format('DD/MM/YYYY') + ' 12:00',
        },
        color: {
          background: '#cfe0fc',
          foreground: '#0a47a9',
        },
      },
      {
        summary: 'Call',
        start: {
          date: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY'),
          dateTime: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY') + ' 11:00',
        },
        end: {
          date: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY'),
          dateTime: Calendar.dayjs().add(2, 'day').format('DD/MM/YYYY') + ' 14:00',
        },
        color: {
          background: '#292929',
          foreground: '#f5f5f5',
        },
      }
      ];
    
      const calendarElement = document.getElementById('meditate-calendar');
      const calendarInstance = Calendar.getInstance(calendarElement);
      calendarInstance.addEvents(events);
    </script>--}}

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($events as $event)
                {
                    title : '{{ $event->name }}',
                    start : '{{ $event->event_date }}',
                    url : '{{ route('edit.event', $event->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
</body>
</html>
