@extends('layouts.app')

@section('content')

    <div class="bg-light container-fluid my-3 p-4"> 
        
        <div class="row justify-content-center">

            <div class="col-lg-6">
                <h2 class="text-secondary text-center mb-4">Nuevo usuario</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(isset($user))
                    <form action="{{route('users.update', $user->id)}}" method="POST" class="border p-4">
                    @method('PUT')
                @else
                    <form action="{{route('users.store')}}" method="POST" class="border p-4">
                @endif
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name ?? '') }} ">  
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10 mx-auto">
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email ?? '') }} ">  
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-lg-4 mx-auto text-center">
                            <button class="btn btn-primary" type="submit">
                                @if(isset($user))
                                    Actualizar
                                @else
                                    Agregar
                                @endif
                            </button>
                        </div>
                    </div>

                    
                    </form>

            </div>
        </div>

    </div>

@endsection