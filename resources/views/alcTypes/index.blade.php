@extends('layouts.app')

@section('title', 'Kategóriák')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Kategóriák</h1>
        <a href="{{ route('alcTypes.create') }}" class="btn btn-primary">Új kategória</a>
    </div>
    <form method="GET" action="{{ route('alcTypes.index') }}" class="row g-2 mb-3">
        <div class="col-sm-8"><input class="form-control" name="search" value="{{ request('search') }}" placeholder="Keresés név alapján"></div>
        <div class="col-auto"><button class="btn btn-secondary">Keresés</button></div>
        <div class="col-auto"><a class="btn btn-outline-secondary" href="{{ route('alcTypes.index') }}">Törlés</a></div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead><tr><th>Név</th><th>Műveletek</th></tr></thead>
            <tbody>
                @forelse($alcTypes as $alcType)
                    <tr>
                        <td><a href="{{ route('alcBrands.index', ['alctype_id' => $alcType->id]) }}" class="link-primary text-decoration-none">{{ $alcType->name }}</a></td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('alcBrands.index', ['alctype_id' => $alcType->id]) }}">Termékek</a>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('alcTypes.edit', $alcType) }}">Szerkesztés</a>
                            <form class="d-inline" method="POST" action="{{ route('alcTypes.destroy', $alcType) }}" onsubmit="return confirm('Biztosan törlöd?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="2">Nincs találat.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $alcTypes->links('pagination::bootstrap-5') }}
@endsection
