@extends('layouts.app')

@section('content')


    <div class="bg-light container-fluid my-3 p-4">

        <div class="row g-4 justify-content-between">

            <div class="col-md-4">
                <span class="text-secondary fs-3">Categories</span>
            </div>

            <div class="col-md-4 text-end pt-2">
                <a href="{{route('categories.create')}}" class="fs-5">Add new category</a>
            </div>

            <div class="table-responsive mt-4">
                <table id="Tciclos" class="table text-start -middle table-bordered  mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col" class="text-center text-secondary">item 1</th>
                            <th scope="col" class="text-center text-secondary">item 2</th>
                            <th scope="col" class="text-center text-secondary">item 3</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>


            
        </div>



    </div>
    
@endsection