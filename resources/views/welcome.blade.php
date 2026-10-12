@extends('layouts.app')

@section('title', 'Főoldal')

@section('content')
    <div class="text-center py-5">
        <h1 class="display-5 mb-3">Kategóriák és termékek</h1>
        <p class="lead text-secondary">Válassz egy menüpontot az adatok kezeléséhez.</p>
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
            <a href="{{ route('alcTypes.index') }}" class="btn btn-primary btn-lg">Kategóriák</a>
            <a href="{{ route('alcBrands.index') }}" class="btn btn-outline-primary btn-lg">Termékek</a>
        </div>
    </div>
@endsection
