<a href="{{ $url ?? 'javascript:void(0)' }}" class="dropdown-item">
@isset($icon)
<i class="{{ $icon ?? '' }}"></i>
@endisset
{{ $label ?? '' }}
</a>
