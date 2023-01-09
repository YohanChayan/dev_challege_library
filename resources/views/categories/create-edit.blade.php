@extends('layouts.app')

@section('content')

    <div class="bg-light container-fluid my-3 p-4"> 
        
        <div class="row justify-content-center">

            <div class="col-lg-6">
                <h2 class="text-secondary text-center mb-4">Nueva categoria</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($category))
                    <form action="{{route('categories.update', $category->id)}}" method="POST" class="border p-4">
                    @method('PUT')
                @else
                    <form action="{{route('categories.store')}}" method="POST" class="border p-4">
                @endif
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{$category->name ?? ''}} ">  
                        </div>
                    </div>
                        
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Descripción</label>
                        <div class="col-sm-9 mx-auto">
                            <div class="col-sm-12">
                                <textarea class="form-control" id="description" name="description" style="height: 150px;"> {{$category->description ?? ''}} </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 mx-auto text-center">
                            <button class="btn btn-primary" type="submit">
                                @if(isset($category))
                                    Actualizar
                                @else
                                    Guardar
                                @endif
                            </button>
                        </div>
                    </div>

                    
                    </form>

            </div>
        </div>

    </div>

@endsection