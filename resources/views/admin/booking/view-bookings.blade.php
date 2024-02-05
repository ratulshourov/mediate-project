@extends('layouts.admin')
@section('title')
Bookings | MeditatePal
@endsection
@section('admin_content')


<!-- Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row vh-20 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="d-flex align-items-center justify-content-between my-4">
            <h3 class="mb-0">Bookings </h6>
            {{-- <a href="" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#bookingModal">Add New</a> --}}
        </div>
    </div>
</div>
<!-- End -->

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @elseif(session('warning'))
            <div class="alert alert-danger" role="alert">
                {{ session('warning') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Length</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Status</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$booking->name}}</td>
                            <td>{{$booking->description}}</td>
                            <td>{{$booking->event_date}}</td>
                            <td>{{$booking->event_time}}</td>
                            <td>{{$booking->event_length}}</td>
                            <td>{{$booking->creator_inf->name}}</td>
                            <td>
                                @if ($booking->event_status == 0)
                                <b class="text-danger">Inactive</b>
                                <a href="{{ route('active.booking', ['id' => $booking->id] )}}" class="btn btn-success btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Active">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </a>
                                @else
                                <b class="text-success">Active</b>
                                <a href="{{ route('deactive.booking', ['id' => $booking->id] )}}" class="btn btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Inactive">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                @endif
                            </td>
                            {{-- <td>
                                <div class="btn-group">
                                    <a href="{{ route('edit.booking', ['id' => $booking->id] )}}" class="btn btn-warning"><i
                                            class="fa fa-pen"></i> </a></a>
                                    <a href="{{ route('delete.booking', ['id' => $booking->id] )}}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete?')"><i
                                            class="fa fa-trash"></i></a>
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Add Eco System Modal -->
{{-- 
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Add Item</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save.booking')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="title"> <b>Title<span class="text-danger">*</span></b> </label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" required>
                                <span class="text-danger">
                                    @error('title')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="description"> <b>Description<span class="text-danger">*</span></b> </label>
                                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" required>
                                <span class="text-danger">
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="image"> <b>Image <span class="text-danger">*</span></b> <sup>[Size: To maintain the design, please use image of same
                                        size
                                        ]</sup></label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"  accept="image/*" required>
                                <span class="text-danger">
                                    @error('image')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="status" class="form-label"><b>Status</b> <br></label>
                                <input type="checkbox" name="status" class="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}


@endsection