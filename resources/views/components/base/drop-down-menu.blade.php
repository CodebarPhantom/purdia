<a href="javascript:void(0)" class="nav-link" data-toggle="dropdown">
    @isset($icon)
        <i class="{{ $icon ?? '' }}"></i>
    @endisset
    {{ $label ?? '' }}
</a>
<div class="dropdown-menu {{ $class ?? '' }} dropdown-menu-arrow">
    {{ $slot }}
</div>
