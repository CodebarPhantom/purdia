<div class="form-group mb-3">
    <label for="{{ $name ?? '' }}"class="form-label">{{ $label ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control" id="{{ $name ?? '' }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}"/>
</div>
