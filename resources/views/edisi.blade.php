<x-layout.app class="edisi">
    
    {{-- Background --}}
    <img src="{{ asset('assets/img/child-pray.jpeg') }}" class="edisi__background">
    
    {{-- Container --}}
    <div class="edisi__container">
        
        {{-- Action --}}
        <div class="edisi__action">
            <a class="action__back" href="{{ route('index') }}">&larr;</a>
            {{-- <button class="action__download">&#x1F5A8; Unduh Renungan</button> --}}
        </div>
        
        {{-- Content --}}
        <div class="edisi__content">
            <div class="edisi__left">
                <div class="left__book">
                    <img class="book__mockup" src="{{ asset('assets/img/book-mockup.png') }}">
                    <img class="book__cover" src="{{ asset('storage/'. $edisi->cover) }}">
                </div>
                <div class="left__description">
                    <h3 class="item__title">{{ $edisi->number }}</h3>
                    <small class="item__date">{{ $edisi->date }}</small>
                </div>
            </div>
            <div class="edisi__right">
                @foreach ($edisi->pages as $page)    
                    <a class="right__item" href="{{ route('page', compact('edisi', 'page')) }}">
                        <div class="item__left">
                            <h4 class="item__title">{{ $page->title }}</h4>
                            <h5 class="item__date">{{ $page->date }}</h5>
                        </div>
                        <span class="item__view">&#x279C;</span>
                    </a>
                @endforeach
                {{-- @livewire('page.create', compact('edisi')) --}}
            </div>
        </div>
        
    </div>
    
</x-layout.app>