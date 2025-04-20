@props(['required' => false])

<label class="label__field" for="">
    {{ $slot }}
    @if ($required)
      <span style="color: #e94c1f; font-family: sans-serif;">*</span>
    @endif
</label>