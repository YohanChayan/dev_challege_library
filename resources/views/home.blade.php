@extends('layouts.app')

@section('content')

<div class="bg-light container-fluid my-3 p-4">
    <div class="row">
        <div class="col-md-8 mx-auto bg-info p-4 rounded border border-primary border-2">
            <h1 class="text-center text-light">Library</h1>
        </div>
    </div>

    <div class="row justify-content-center mt-4 g-3">
        <div class="col-md-4">
            <div class="alert alert-info" role="alert">
                A simple info alert—check it out!
            </div>
        </div>
        <div class="col-md-4">
            <div class="alert alert-success" role="alert">
                A simple info alert—check it out!
            </div>
        </div>
        <div class="col-md-4">
            <div class="alert alert-primary" role="alert">
                A simple info alert—check it out!
            </div>
        </div>
    </div>

</div>

@endsection
