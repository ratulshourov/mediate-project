<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDIATE</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('fullcalendar')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('fullcalendar')}}/lib/main.min.css">
    <script src="{{asset('fullcalendar')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('fullcalendar')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('fullcalendar')}}/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }

        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient" id="topNavBar" style="background-color:red">
        <div class="container">
            <a class="navbar-brand" href="https://sourcecodester.com">
                MEDIATE
            </a>

            <div>
                <b class="text-light">Do Your Schedule Here</b>
            </div>
        </div>
    </nav>
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-2" style="border:1px solid black;">
                <p>Booking</p>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary" data-mdb-ripple-init>+ Book a
                            session</button><br />
                        <p style="margin-top:3px;font-size:small;color:blue;">See Favourite Availablity</p>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">

                        <p style="margin-top:3px;font-size:small;color:blue;">Upcoming</p>
                        <button style="font-size: small;" type="button" class="btn btn-primary" data-mdb-ripple-init>No
                            Upcoming session</button>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p style="margin-top:3px;font-size:small;color:blue;">Session Setting</p>
                        <p style="margin-top:3px;font-size:small;color:blue;">My Task</p>
                        <div style="font-width: small;" class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Desk </button>
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Moving</button>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12" style="font-width:small">
                        <p style="margin-top:3px;font-size:small;color:blue;">Partner</p>

                        <div style="font-width: small;" class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init> Favourite
                            </button>
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Anyone</button>

                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12" style="font-width:small">
                        <p style="margin-top:3px;font-size:small;color:blue;">Groups</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                            <label style="font-width: small; color:blue;" class="form-check-label" for="inlineCheckbox1">All Favourite Members</label>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-7">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title">Schedule Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="{{ url('/save-event') }}" method="post" id="schedule-form">
                                @csrf
                                <input type="hidden" name="id" value="">
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="name"
                                        id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description"
                                        id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0"
                                        name="event_date" id="start_datetime" required>
                                </div>

                                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="event_length"> <b>Meditate Time<span class="text-danger">*</span></b> </label>
                        <div class="btn-group">
                            <input type="radio" class="btn-check @error('event_length') is-invalid @enderror" name="event_length" id="option1" value="15" autocomplete="off" checked />
                            <label class="btn btn-secondary" for="option1" data-mdb-ripple-init>15 min</label>
                          
                            <input type="radio" class="btn-check @error('event_length') is-invalid @enderror" name="event_length" id="option2" value="25" autocomplete="off" />
                            <label class="btn btn-secondary" for="option2" data-mdb-ripple-init>25 min</label>
                          
                            <input type="radio" class="btn-check @error('event_length') is-invalid @enderror" name="event_length" id="option3" value="45" autocomplete="off" />
                            <label class="btn btn-secondary" for="option3" data-mdb-ripple-init>45 min</label>
                        </div>
                        <span class="text-danger">
                            @error('event_length')
                                <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </span>
                    </div>
                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i
                                    class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i
                                    class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Length(Min)</dt>
                            <dd id="length" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit"
                            data-id="">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete"
                            data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->


    <?php 

?>
</body>
<script>
    var scheds = @json($sched_res);
    console.log(scheds);
</script>
<script src="{{asset('fullcalendar')}}/js/script.js"></script>

</html>