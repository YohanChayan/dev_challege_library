@extends('layouts.app')


@section('content')

    <div class="bg-light container-fluid my-3 p-4">

        <div class="col-sm-12 col-xl-8 mx-auto border">
            <div class="bg-light rounded h-100 p-4">
                <h5 class="mb-4 text-secondary">Create-edit new Book</h5>
                <form action="#" method="POST">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="category">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="published_date" class="col-sm-2 col-form-label">published Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="published_date">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 mx-auto text-center">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection