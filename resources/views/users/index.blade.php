@extends('layouts.app')

@section('scripts')

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script src="{{asset('js/users/index.js')}}"></script>
@endsection

@section('content')


    <div class="bg-light container-fluid my-3 p-4">

        <div class="row g-4 justify-content-between">

            <div class="col-lg-4">
            <span class="text-secondary fs-3 fw-bold">Usuarios</span>
            </div>

            <div class="col-lg-4 text-start text-lg-end pt-2">
                <a href="{{route('users.create')}}" class="fs-5">Añadir nuevo usuario</a>
            </div>

            <div class="table-responsive mt-4">
                <table class="table text-start -middle table-bordered  mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col" class="text-center text-secondary">ID</th>
                            <th scope="col" class="text-center text-secondary">Nombre</th>
                            <th scope="col" class="text-center text-secondary">Correo</th>
                            <th scope="col" class="text-center text-secondary">Prestamos actuales</th>
                            <th scope="col" class="text-center text-secondary">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}} </td>
                                <td class="text-center pt-3" width="20%"> 
                                    <span class="text-secondary fw-bold">
                                        @if(count($user->books) > 0)
                                            <span class="text-danger">{{count($user->books)}}</span>
                                        @else
                                            <span class="text-primary">{{count($user->books)}}</span>
                                        @endif
                                    </span>
                                    
                                </td>
                                <td>
                                    <div class="row justify-content-evenly g-3">
                                        <div class="col-lg-4">
                                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                <span>
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                        </div>

                                        <div class="col-lg-4">
                                            <a onclick="toTrashUser({{$user->id}})" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                                <span>
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <form id="deleteUsrForm" action="#" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>    

                    </tbody>
                </table>

                <div class="d-flex justify-content-center my-2">
                    {{$users->links()}}
                </div>

            </div>
           
        </div>

    </div>
    
@endsection