@extends('layouts.app')

@section('title', 'Termék szerkesztése')

@section('content')
    <h1>Termék szerkesztése</h1>
    <form method="POST" action="{{ route('alcBrands.update', $alcBrand) }}">
        @include('alcBrands._form')
    </form>
@endsection
