@extends('layouts.app')

@section('title', 'Kategória szerkesztése')

@section('content')
    <h1>Kategória szerkesztése</h1>
    <form method="POST" action="{{ route('alcTypes.update', $alcType) }}">
        @include('alcTypes._form')
    </form>
@endsection
