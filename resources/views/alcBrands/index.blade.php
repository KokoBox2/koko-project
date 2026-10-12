@extends('layouts.app')

@section('title', 'Termékek')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Termékek</h1>
        <a href="{{ route('alcBrands.create') }}" class="btn btn-primary">Új termék</a>
    </div>
    <form method="GET" action="{{ route('alcBrands.index') }}" class="row g-2 mb-3">
        <div class="col-md-5"><input class="form-control" name="search" value="{{ request('search') }}" placeholder="Keresés név vagy íz alapján"></div>
        <div class="col-md-4">
            <select class="form-select" name="alctype_id">
                <option value="">Összes kategória</option>
                @foreach($alcTypes as $alcType)
                    <option value="{{ $alcType->id }}" @selected(request('alctype_id') == $alcType->id)>{{ $alcType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto"><button class="btn btn-secondary">Szűrés</button></div>
        <div class="col-auto"><a class="btn btn-outline-secondary" href="{{ route('alcBrands.index') }}">Törlés</a></div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead><tr><th>Név</th><th>Kategória</th><th>Alkoholtartalom</th><th>Íz</th><th>Műveletek</th></tr></thead>
            <tbody>
                @forelse($alcBrands as $alcBrand)
                    <tr>
                        <td>{{ $alcBrand->name }}</td>
                        <td>{{ $alcBrand->alcType?->name }}</td>
                        <td>{{ $alcBrand->alcpercent }}%</td>
                        <td>{{ $alcBrand->flavour }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('alcBrands.edit', $alcBrand) }}">Szerkesztés</a>
                            <form class="d-inline" method="POST" action="{{ route('alcBrands.destroy', $alcBrand) }}" onsubmit="return confirm('Biztosan törlöd?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Nincs találat.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $alcBrands->links('pagination::bootstrap-5') }}
@endsection
