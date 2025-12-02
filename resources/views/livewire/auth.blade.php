<x-modal>
    <x-slot:trigger>
        <div class="jumbotron__author">
            <img class="author__logo" src="{{ asset('assets/img/logo.png') }}">
            {{-- <h3 class="author__name">by Cyecilia Pical</h3> --}}
        </div>
    </x-slot:trigger>
    <form wire:submit="auth">
        <div class="input">
            <label>Kode</label>
            <input type="password" name="code" wire:model="code">
            @error('code')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="buttons">
            <button type="button" class="button button__outline" x-on:click="open = false">Batal</button>
            <button type="submit" class="button">Masuk</button>
        </div>
    </form>
</x-modal>