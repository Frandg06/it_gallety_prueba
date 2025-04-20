@props(['name'])

<select name="{{ $name }}" id="{{ $name }}" class="form__field">
  {{ $slot }}
</select>