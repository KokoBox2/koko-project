@csrf
@if(isset($alcBrand))
    @method('PUT')
@endif
<div class="mb-3">
    <label class="form-label" for="name">Termék neve</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', $alcBrand->name ?? '') }}" required maxlength="255">
</div>
<div class="mb-3">
    <label class="form-label" for="alctype_id">Kategória</label>
    <select class="form-select" id="alctype_id" name="alctype_id" required>
        <option value="">Válassz kategóriát</option>
        @foreach($alcTypes as $alcType)
            <option value="{{ $alcType->id }}" @selected(old('alctype_id', $alcBrand->alctype_id ?? request('alctype_id')) == $alcType->id)>{{ $alcType->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label" for="alcpercent">Alkoholtartalom (%)</label>
    <input class="form-control" type="number" min="0" max="100" id="alcpercent" name="alcpercent" value="{{ old('alcpercent', $alcBrand->alcpercent ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label" for="flavour">Íz</label>
    <input class="form-control" id="flavour" name="flavour" value="{{ old('flavour', $alcBrand->flavour ?? '') }}" required maxlength="255">
</div>
<button class="btn btn-primary">Mentés</button>
<a class="btn btn-outline-secondary" href="{{ route('alcBrands.index') }}">Mégse</a>
