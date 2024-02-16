@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }}<br/> --}}
                    <a data-mdb-ripple-init data-mdb-modal-init href="#scheduleModal" role="button" class="btn btn-primary mx-2 mb-2" style="float: right;">ADD EVENT</a>
                    <a data-mdb-ripple-init data-mdb-modal-init href="{{ url('/video_chat') }}" role="button" class="btn btn-primary mx-2 mb-2" style="float: right;">Joined Call</a>
                    <!-- Start your project here-->
                    <div class="container">
                        {{-- <div class="calendar" data-mdb-calendar-init id="meditate-calendar"></div> --}}
                        <div id='calendar'></div>
                    </div>
                    <!-- End your project here-->
                </div>
            </div>
        </div>
    </div>
</div>



<!-- First modal dialog -->
<div class="modal fade" id="scheduleModal" aria-hidden="true" aria-labelledby="scheduleModalLabel1" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleModalLabel1">Book Schedule</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('save.event')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="name"> <b>Meditate Title<span class="text-danger">*</span></b> </label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Title" required>
                        <span class="text-danger">
                            @error('name')
                                <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </span>
                    </div>
                </div>
                <br>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="description"> <b>Meditate Description</b> </label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" placeholder="Enter Description"></textarea>
                        {{-- <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" required> --}}
                    </div>
                </div>
                <br>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="date"> <b>Meditate Date<span class="text-danger">*</span></b> </label>
                        <div class="form-outline" data-mdb-datepicker-init data-mdb-input-init>
                            <input type="text" name="event_date" class="form-control @error('event_date') is-invalid @enderror" id="exampleDatepicker11" />
                            <label for="exampleDatepicker11" class="form-label">Select a date</label>
                        </div>
                        {{-- <input type="date" name="event_date" class="form-control @error('event_date') is-invalid @enderror" placeholder="Enter Ecent Date" required> --}}
                        <span class="text-danger">
                            @error('event_date')
                                <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </span>
                    </div>
                </div>
                <br>
                <div class="col-lg-12">
                    
                    <div class="form-group mb-3">
                        <label for="event_time"> <b>Meditate Time<span class="text-danger">*</span></b> </label>
                        <div class="form-outline timepicker" data-mdb-timepicker-init data-mdb-input-init>
                            <input type="text" class="form-control @error('event_time') is-invalid @enderror" name="event_time" id="form11" required />
                            <label class="form-label" for="form11">Select a time</label>
                        </div>
                        {{-- <input type="time" name="event_time" class="form-control @error('event_time') is-invalid @enderror" placeholder="Enter Event Time" required> --}}
                        <span class="text-danger">
                            @error('event_time')
                                <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </span>
                    </div>
                </div>
                <br>
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
                <br>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection
