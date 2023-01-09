@extends('layouts.app')

@section('scripts')
    
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script src="{{ asset('js/categories/index.js')}} "></script>
@endsection

@section('content')


    <div class="bg-light container-fluid my-3 p-4">

        <div class="row g-4 justify-content-between">

            <div class="col-md-4">
                <span class="text-secondary fs-3 fw-bold">Categorias</span>
            </div>

            <div class="col-md-4 text-end pt-2">
                <a href="{{route('categories.create')}}" class="fs-5">Agregar nueva categoria</a>
            </div>

            <div class="table-responsive mt-4">
                <table class="table text-start-middle table-bordered  mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col" class="text-center text-secondary">ID</th>
                            <th scope="col" class="text-center text-secondary">Nombre</th>
                            <th scope="col" class="text-center text-secondary">Descripción</th>
                            <th scope="col" class="text-center text-secondary">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td width="60%">{{$cat->description}}</td>
                                <td>

                                    <div class="row justify-content-evenly g-3">
                                        <div class="col-lg-4">
                                            <a href="{{route('categories.edit', $cat->id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                <span>
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                        </div>

                                        <div class="col-lg-4">
                                            <a onclick="toTrashCat({{$cat->id}})" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                                <span>
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </div>
                                    
                                    </div>

                                </td>
                            </tr>

                        @endforeach

                        <form id="deleteCatForm" action="#" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>    

                    </tbody>

                </table>

                <div class="d-flex justify-content-center my-2">
                    {{$categories->links()}}
                </div>
        </div>


            
        </div>



    </div>
    
@endsection