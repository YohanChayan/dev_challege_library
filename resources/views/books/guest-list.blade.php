@extends('layouts.app')

@section('scripts')
    <script src="{{asset('js/books/guest.js')}} "></script>
@endsection

@section('content')


    <div class="bg-light container my-3 p-4">
        
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
            
            <p class="text-secondary fs-2 fw-bold text-center">Libros existentes</p>

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
                                    <div class="row justify-content-center g-3">
                                        @if( !is_null($book->user_id) )
                                        
                                            <div class="col-lg-6">
                                                <a onclick="notifyme({{$book->id}})" class="btn btn-success">
                                                    Notificar Disponibilidad
                                                </a>
                                            </div>
                                        @else
                                            <div class="col-lg-6 text-center">
                                                <a style="cursor: default" class="btn btn-secondary">
                                                    <i class="fas fa-ban"></i>
                                                </a>
                                            </div>

                                        @endif
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="d-flex justify-content-center my-2">
                    {{$books->links()}}
                </div>

            </div>

        </div>


        <!-- Modal -->
<div class="modal fade" id="InsertGuestDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('books.notifyme')}} " method="POST" class="border p-4 bg-light">
      <div class="modal-body">
            @csrf
            <div class="row mb-4">
                <label for="email" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email">  
                    <span class="small my-2">Para esta acción, debe primero tener un correo válido</span>
                </div>
            </div>
            
            <input type="hidden" name="book" id="book">

            <div class="form-floating">
                <select class="form-select" name="notify_via" id="notify_via">
                    <option selected value=""> - </option>
                    <option value="whatsapp"> Whatsapp </option>
                    <option value="telegram"> Telegram </option>
                    <option value="facebook_messenger"> Facebook Messenger </option>
                    <option value="email"> Correo </option>

                </select>
                <label for="user">Seleccione Medio de notificacion</label>

            </div>

      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
    </div>
  </div>
</div>

        
    </div>
    
@endsection