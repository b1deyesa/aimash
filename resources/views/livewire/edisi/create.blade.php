<x-modal class="edisi__create">
    <x-slot:trigger>
        <span x-on:click="open = true">&#8853;</span>
    </x-slot:trigger>

    <form wire:submit="save">
        <label x-data="{isDropping:false,handleDrop(e){this.isDropping=false;$wire.set('cover',e.dataTransfer.files[0]);}}" @dragover.prevent="isDropping=true" @dragleave.prevent="isDropping=false" @drop.prevent="handleDrop" class="dropbox">
            <input type="file" wire:model="cover" hidden>
            @if ($cover)
                <img src="{{ $cover->temporaryUrl() }}">
            @else
                <small>Drag & Drop Gambar</small>
                @error('cover')
                    <p class="error">{{ $message }}</p>
                @enderror
            @endif
        </label>
        <div class="form__right">
            <div class="input">
                <label>Edisi</label>
                <input type="text" name="number" wire:model="number">
                @error('number')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="right__bottom">
                <div class="input">
                    <label>Dari</label>
                    <input type="date" name="date_start" wire:model="date_start">
                    @error('date_start')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input">
                    <label>Sampai</label>
                    <input type="date" name="date_end" wire:model="date_end">
                    @error('date_end')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="buttons">
                <button type="button" class="button button__outline" x-on:click="open = false">Batal</button>
                <button type="submit" class="button">Simpan</button>
            </div>
        </div>

    </form>
</x-modal>
