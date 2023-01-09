@extends('layouts.app')

@section('scripts')

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script src="{{asset('js/books/index.js')}} "></script>
@endsection

@section('content')


    <div class="bg-light container-fluid my-3 p-4">
        
        <div class="row g-4 justify-content-between">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-md-4">
                <span class="text-secondary fs-3 fw-bold">Libros</span>
            </div>

            <div class="col-md-4 text-end pt-2">
                <a href="{{route('books.create')}}" class="fs-5">Agregar nuevo libro</a>
            </div>

            <div class="table-responsive mt-4">
                <table class="table text-start -middle table-bordered  mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col" class="text-center text-secondary">ID</th>
                            <th scope="col" class="text-center text-secondary">Nombre</th>
                            <th scope="col" class="text-center text-secondary">Autor</th>
                            <th scope="col" class="text-center text-secondary">Fecha de publicación</th>
                            <th scope="col" class="text-center text-secondary">Estatus</th>
                            <th scope="col" class="text-center text-secondary">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)

                            <tr>
                                
                                <td class="text-center">{{$book->id}} </td>
                                <td class="text-center">{{$book->name}} </td>
                                <td class="text-center">{{$book->author}} </td>
                                <td class="text-center"> {{( $book->published_date)}} </td>
                                <td class="text-center"> 
                                    @if( is_null($book->user_id) )
                                        <p class="m-0 fw-bold text-success">Disponible</p>
                                    @else
                                        <p class="m-0 fw-bold text-danger">No disponible</p>
                                    @endif
                                </td>

                                <td>
                                    <div class="row justify-content-evenly g-3">
                                        @if( is_null($book->user_id) )

                                            <div class="col-lg-3">
                                                <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>

                                            <div class="col-lg-3">
                                                <a onclick="toTrashBook({{$book->id}})" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>

                                            <div class="col-lg-3">
                                                <a href="{{route('books.borrows', $book->id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Prestamo">
                                                    <i class="fas fa-hand-paper"></i>
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-lg-3">
                                                <a onclick="submitReturnBookForm({{$book->id}})" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Regresar">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                        <form id="deleteBookForm" action="#" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>    

                        <form id="returnBookForm" action="{{route('books.return')}} " method="POST" class="d-none">
                            <input type="hidden" name="Returnbook_id" id="Returnbook_id">
                            @csrf
                        </form>    

                    </tbody>
                </table>

                <div class="d-flex justify-content-center my-2">
                    {{$books->links()}}
                </div>

            </div>

        </div>

        
    </div>
    
@endsection