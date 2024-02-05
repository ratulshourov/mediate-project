@extends('layouts.admin')

@section('admin_content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="col-md-12">

        </div>
    </div>
</div>

@endsection
