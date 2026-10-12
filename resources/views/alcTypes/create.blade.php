@extends('layouts.app')

@section('title', 'Új kategória')

@section('content')
    <h1>Új kategória</h1>
    <form method="POST" action="{{ route('alcTypes.store') }}">
        @include('alcTypes._form')
    </form>
@endsection
