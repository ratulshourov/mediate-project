<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB ESSENTIAL -->
    <link rel="stylesheet" href="{{ asset('mdbootstrap/css/mdb.min.css') }}" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <!-- MDB PLUGINS -->
    {{-- <link rel="stylesheet" href="{{ asset('mdbootstrap/plugins/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('mdbootstrap/plugins/css/calendar.min.css') }}" /> --}}
    <!-- Custom styles -->
    <style></style>
  </head>

  <body>
    <!-- Start your project here-->
    <div class="container">
      <h3>Calendar</h3>

      <div id='calendar'></div>
    </div>
    <!-- End your project here-->
  </body>

  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

</html>
