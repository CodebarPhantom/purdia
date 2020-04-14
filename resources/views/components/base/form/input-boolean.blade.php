<div class="form-group">
    <label class="custom-switch">
        <input type="radio" id="{{ $name ?? '' }}" name="{{ $name ?? '' }}" value="{{ $value ?? 0 }}" class="custom-switch-input" @if($value == 1) checked @endif>
        <span class="custom-switch-indicator"></span>
        <span class="custom-switch-description">{{ $label ?? '' }}</span>
    </label>
</div>
