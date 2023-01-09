@extends('layouts.app')

@section('content')

    <div class="bg-light container-fluid my-3 p-4">

        <div class="col-lg-8 mx-auto">
            <h2 class="text-center text-secondary">Prestamo</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>

        <div class="row g-3 mt-4">
            {{-- book info --}}
            <div class="col-lg-8 mx-auto">
                <div class="card text-center">
                    <div class="card-header"> 
                        <span class="fw-bold"> Libro </span> 
                    </div>
                    <div class="card-body">
                      <h5 class="card-title text-secondary">{{$book->name}}</h5>
                      <p class="card-text"><span class="text-secondary fw-bold">Autor:</span> {{$book->author}}.</p>
                    </div>
                    <div class="card-footer text-muted">
                      Fecha de publicación: {{$book->published_date}}
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-3 mt-2">
            
            <form action="{{route('books.assignUser')}} " method="POST" class="border">
                @csrf
                <div class="row my-2 justify-content-center">
                    <div class="col-lg-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="user" id="user" aria-label="Floating label select example">
                                <option selected> - </option>
                                
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}} - {{$user->email}}</option>
                                @endforeach

                            </select>
                            <label for="user">Seleccione usuario</label>

                            <input type="hidden" name="book" id="book" value="{{$book->id}}">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center my-2">
                    <div class="col-lg-3 text-center">
                        <button class="btn btn-success"> Asignar </button>
                    </div>
                </div>

            </form>
        </div>


        
    </div>

@endsection