@extends('layouts.app')

@section('content')

<div class="bg-light container my-2 p-2">
    <div class="row">
        <div class="col-md-8 mx-auto bg-primary p-4 rounded border border-primary border-2">
            <h1 class="text-center text-light">
                Bienvenido 
                <i class="fas fa-book"></i> 
            </h1>
        </div>
    </div>

    <div class="my-4 alert alert-dark col-lg-5 mx-auto text-center text-dark fw-bold" role="alert">
        Para poder prestar libros debe poseer un correo valido!
    </div>

    <div class="row justify-content-center mt-4 g-3">
        <div class="col-lg-3">
            <div class="alert alert-info" role="alert">
                Si eres admin favor de acceder con las credenciales (disponible en la descripcion de GitHub).
            </div>
        </div>
        <div class="col-lg-3">
            <div class="alert alert-success" role="alert">
                Como usuario general puedes ver el catalogo de libros existentes, puedes incluso pedir que te envien un mensaje de alerta cuando el libro que deseas se encuentre disponible. <span class="fw-bold">Esta opción solo estará disponible cuando dicho libro no se encuentra disponible </span>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="alert alert-primary" role="alert">
                Para pedir que te envien una alerta debes poseer un correo valido, de esta manera se sabrá que estas de alta en el sistema, de lo contrario no se te permitirá.
            </div>
        </div>
    </div>

</div>

@endsection
