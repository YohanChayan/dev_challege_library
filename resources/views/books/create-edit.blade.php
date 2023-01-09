@extends('layouts.app')

@section('scripts')
    <script src="{{asset('js/books/create-edit.js')}}"></script>

    @if(isset($book))
        <script>
            loadBookCategories(@json($book->category));
        </script>
    @endif

@endsection

@section('content')

    <div class="bg-light container-fluid my-3 p-4">

        <div class="col-sm-12 col-xl-12 mx-auto p-3 border">
            <div class="bg-light rounded h-100 p-4">
                
                <div class="row g-4">
                    <div class="col-lg-8">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(isset($book))
                            <h2 class="mb-4 text-secondary text-center">Editar libro</h2>

                            <form onsubmit="submitBook(event)" action="{{route('books.update', $book->id)}}" method="POST">
                            @method('PUT')
                        @else
                            <h2 class="mb-4 text-secondary text-center">Nuevo libro</h2>

                            <form action="{{route('books.store')}}" method="POST">
                        @endif
                            
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$book->name ?? '') }} ">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="author" class="col-sm-2 col-form-label">Autor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="author" name="author" value="{{old('author',$book->author ?? '') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category" class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-sm-10">
                                    {{-- <input type="text" class="form-control" id="category" name="category" value="{{old('category',$book->category ?? '') }}"> --}}
                                    
                                    <div class="row gx-2">
                                        <div class="col-lg-10">
                                            <input list="categories" name="category" id="category" class="form-control"
                                            pattern="{{implode('|', $categories)}}"
                                            title='Debe eligir una categoria existente'>
                                            <datalist id="categories">
                                        
                                                @foreach ($categories as $category)
                                                <option value="{{$category}}">
                                                    @endforeach
                                                </datalist>
                                        </div>
                                        <div class="col-lg-2 my-lg-0 my-2 text-center">
                                            <a class="btn btn-primary" onclick="AddCheckCategory(document.querySelector('#category'))">
                                                <i class="far fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="published_date" class="col-sm-2 col-form-label">Published Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="published_date" name="published_date" value="{{old('published_date',$book->published_date ?? '') }}">
                                </div>
                            </div>

                            <input type="hidden" name="_category" id="_category">

                            <div class="row justify-content-center">
                                <div class="col-md-4 mx-auto text-center">
                                    <button type="submit" class="btn btn-primary">
                                        @if(isset($book))
                                            Actualizar libro
                                        @else
                                            Guardar libro
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </form>
            
                    </div>

                    <div class="col-lg-4">
                        <h4 class="text-center text-secondary">Categorias seleccionadas</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Nombre</th>
                                        <th scope="col" class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tBodyCategories">
                                    {{-- <tr id="cate-1">
                                        <td class="text-center">
                                            <h5 class="text-secondary">Category</h5>
                                        </td>
                                        <td class="text-center">
                                            <a onclick="removeCate(this)" class="btn btn-danger">
                                                <i class="fa-xs fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>


                    </div>

                </div>

               
            </div>
        </div>

    </div>



@endsection