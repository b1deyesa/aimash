<div @if($class) class="{{ $class }}" @endif x-data="{ open: false }">
    @if ($trigger)
        <span x-on:click="open = true">        
            {{ $trigger  }}
        </span>
    @else
        <button x-on:click="open = true">{{ $label }}</button>
    @endif
    <div class="modal" x-show="open">
        <div class="modal__container">
            {{ $slot }}
        </div>
    </div>
</div>
