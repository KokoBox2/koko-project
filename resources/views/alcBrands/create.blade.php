@extends('layouts.app')

@section('title', 'Új termék')

@section('content')
    <h1>Új termék</h1>
    <form method="POST" action="{{ route('alcBrands.store') }}">
        @include('alcBrands._form')
    </form>
@endsection
