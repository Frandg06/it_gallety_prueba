@props(['route', 'isActive' => false])

<a href="{{ url($route) }}" class="nav__link {{ $isActive ? 'active' : '' }}">
  {{ $slot }}
</a>