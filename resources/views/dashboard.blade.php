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

    <div class="row justify-content-center mt-4 g-3">
        <div class="col-lg-4">
            <div class="alert alert-info" role="alert">
                Seccion de libros: En esta seccion se administran los libros, se crean, modifican, eliminan, y se gestiona los cambios de estatus de prestamo de cada libro existente!
            </div>
        </div>
        <div class="col-lg-4">
            <div class="alert alert-success" role="alert">
                Seccion de Categorias: En esta seccion se definen las nuevas categorias disponibles para los libros!
            </div>
        </div>
        <div class="col-lg-4">
            <div class="alert alert-primary" role="alert">
                Seccion de Usuarios: En esta seccion se dan de alta a usuarios para que puedan hacer prestamos!
            </div>
        </div>
    </div>

    <div class="col-lg-8 mx-auto">
        <div class="alert alert-secondary" role="alert">
            En la integracion se utilizaron los events y listener de Laravel, de manera que cuando un libro esesta disponible, se le enviará un mensage al usuario que desea dicho libro. 
            <p class="fw-bold">Se hicieron pruebas con envios de correo, con Mailtrap!</p>
        </div>
    </div>

</div>

@endsection
