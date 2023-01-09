@extends('layouts.app')

@section('scripts')
    <script src="{{asset('js/books/index.js')}} "></script>
@endsection

@section('content')


    <div class="bg-light container-fluid my-3 p-4">
        
        <div class="row g-4 justify-content-between">

            <div class="col-md-4">
                <span class="text-secondary fs-3">Libros</span>
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
                                        <div class="col-lg-4">
                                            <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary">
                                                <span>
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                        </div>

                                        <div class="col-lg-4">
                                            <a onclick="submitRemoveBook({{$book->id}})" class="btn btn-danger">
                                                <span>
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                        <form id="deleteBookForm" action="#" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
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