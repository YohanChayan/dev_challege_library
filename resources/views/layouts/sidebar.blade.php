<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{route('home')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Library</h3>
        </a>

        <div class="navbar-nav w-100">
            <a href="{{route('home')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Inicio</a>

            <a href="{{route('books.index')}}" class="nav-item nav-link"> 
                <i class="fas fa-book me-2"></i>
                Libros
            </a>
            
            <a href="{{route('categories.index')}}" class="nav-item nav-link">
                <i class="fas fa-puzzle-piece me-2"></i>
                Categorias
            </a>
            <a href="{{route('users.index')}}" class="nav-item nav-link">
                <i class="fas fa-users me-2"></i>
                Usuarios
            </a>
        </div>
    </nav>
</div>