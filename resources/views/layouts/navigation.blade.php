<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Kategóriák és termékek</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('home') }}">Főoldal</a>
            <a class="nav-link" href="{{ route('alcTypes.index') }}">Kategóriák</a>
            <a class="nav-link" href="{{ route('alcBrands.index') }}">Termékek</a>
        </div>
    </div>
</nav>
