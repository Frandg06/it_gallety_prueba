@props(['isActive' => false])

<button class="tab__button {{ $isActive ? 'active' : '' }}">
  {{ $slot }}
</button>