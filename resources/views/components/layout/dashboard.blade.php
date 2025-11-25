<x-layout.app class="dashboard">
    <section @if($class) class="{{ $class }}" @endif>
        {{ $slot }}
    </section>
</x-layout.app>