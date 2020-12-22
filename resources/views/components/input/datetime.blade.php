<div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="
    window.flatpickr($refs.input, {
      dateFormat: 'J M Y h:iK',
      defaultDate: value,
      enableTime: true,
    });
  "
    x-on:change="value = $event.target.value"
    class="relative flex"
    wire:ignore
>
    <input
        {{ $attributes->whereDoesntStartWith('wire:model') }}
        x-ref="input"
        x-bind:value="value"
        class="
      rounded-none rounded-r-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300
      @if($attributes->get('disabled', false)) opacity-75 bg-gray-100 @endif
            "
        placeholder="YYYY-MM-DD HH:MM:SS"
    />
</div>
