@csrf
@if(isset($alcType))
    @method('PUT')
@endif
<div class="mb-3">
    <label class="form-label" for="name">Kategória neve</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', $alcType->name ?? '') }}" required maxlength="255">
</div>
<button class="btn btn-primary">Mentés</button>
<a class="btn btn-outline-secondary" href="{{ route('alcTypes.index') }}">Mégse</a>
