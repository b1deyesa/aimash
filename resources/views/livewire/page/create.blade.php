<x-modal class="page__create">
    <x-slot:trigger>
        <span class="icon" x-on:click="open = true">&#8853;</span>
    </x-slot:trigger>

    <form wire:submit="save">
        <label x-data="{isDropping:false,handleDrop(e){this.isDropping=false;$wire.set('document',e.dataTransfer.files[0]);}}" @dragover.prevent="isDropping=true" @dragleave.prevent="isDropping=false" @drop.prevent="handleDrop" class="dropbox">
            <input type="file" wire:model="document" hidden>
            @if ($document)
                <img src="{{ $document->temporaryUrl() }}">
            @else
                <small>Drag & Drop Gambar</small>
                @error('document')
                    <p class="error">{{ $message }}</p>
                @enderror
            @endif
        </label>
        <div class="form__right">
            <div class="input">
                <label>Judul Renungan</label>
                <input type="text" name="title" wire:model="title">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input">
                <label>Tanggal Renungan</label>
                <input type="date" name="date" wire:model="date">
                @error('date')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <hr>
            <div class="input">
                <label>Audio Bahasa Indonesia 🇮🇩</label>
                <input type="file" name="audio_ind" wire:model="audio_ind">
                @error('audio_ind')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input">
                <label>Audio Bahasa Inggris 🇬🇧</label>
                <input type="file" name="audio_eng" wire:model="audio_eng">
                @error('audio_eng')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="buttons">
                <button type="button" class="button button__outline" x-on:click="open = false">Batal</button>
                <button type="submit" class="button">Simpan</button>
            </div>
        </div>

    </form>
</x-modal>
