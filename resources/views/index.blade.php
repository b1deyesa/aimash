<x-layout.app class="index">
    
    {{-- Jumbotron --}}
    <section class="jumbotron">
        <img src="{{ asset('assets/img/child-pray.jpeg') }}" class="jumbotron__background">
        <div class="jumbotron__container">
            @livewire('auth')
            <h1 class="jumbotron__title">Aku Ingin Membaca Alkitab Setiap Hari</h1>
            <h2 class="jumbotron__subtitle">Renungan Harian Kristen Anak Usia 6-11 Tahun</h2>
            <p class="jumbotron__quote">“Firman-Mu itu pelita bagi kakiku dan terang bagi jalanku”<br>Mazmur 119:105</p>
        </div>
    </section>
    
    {{-- Step --}}
    <section class="step">
        <div class="step__container">
            <div class="step__header">
                <h2 class="header__title">Halo teman-teman 👋🏻</h2>
                <h2 class="header__subtitle">Berikut adalah langkah-langkah yang bisa kamu lakukan jika kamu ingin belajar membaca Alkitab setiap hari.</h2>
            </div>
            <img class="step__image" src="{{ asset('assets/img/step.png') }}">
            <img class="step__image__mobile" src="{{ asset('assets/img/step-mobile.png') }}">
        </div>
    </section>
    
    {{-- Books --}}
    <section class="books">
        <div class="books__container">
            <div class="books__header">
                <h2 class="header__title">Renungan Harian</h2>
            </div>
            <div class="books__list">
                @auth
                    @livewire('edisi.create')
                @endauth
                @foreach ($edisis as $edisi)    
                    <a class="item" href="{{ route('edisi', compact('edisi')) }}">
                        <div class="item__book">
                            <img class="book__mockup" src="{{ asset('assets/img/book-mockup.png') }}">
                            <img class="book__cover" src="{{ asset('storage/'. $edisi->cover) }}">
                        </div>
                        <div class="item__description">
                            <h3 class="item__title">{{ $edisi->number }}</h3>
                            <small class="item__date">{{ $edisi->date }}</small>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    
</x-layout.app>