<x-layout.app class="page">
    
    {{-- Background --}}
    <img src="{{ asset('assets/img/child-pray.jpeg') }}" class="page__background">
    
    {{-- Container --}}
    <div class="page__container">
        
        {{-- Action --}}
        <div class="page__action">
            <a class="action__back" href="{{ route('edisi', compact('edisi')) }}">&larr;</a>
            <div class="action__right">

                <div class="action__audio">

                    <div class="audio__item">
                        <h6 class="item__title">Bahasa Indonesia 🇮🇩</h6>

                        @if ($page->audio_ind)
                            <button class="item__content" type="button">
                                <span class="play-btn">&#9654; Putar</span>
                                <span class="pause-btn" style="display:none;">&#9208;</span>

                                <audio class="audio">
                                    <source src="{{ asset('storage/'. $page->audio_ind) }}" type="audio/mp4">
                                    Browser Anda tidak mendukung audio.
                                </audio>
                            </button>
                        @else
                            <span class="item__unavail">Belum Tersedia</span>
                        @endif
                    </div>

                    <div class="audio__item">
                        <h6 class="item__title">Bahasa Inggris 🇬🇧</h6>

                        @if ($page->audio_eng)
                            <button class="item__content" type="button">
                                <span class="play-btn">&#9654; Play</span>
                                <span class="pause-btn" style="display:none;">&#9208;</span>

                                <audio class="audio">
                                    <source src="{{ asset('storage/'. $page->audio_eng) }}" type="audio/mp4">
                                    Browser Anda tidak mendukung audio.
                                </audio>
                            </button>
                        @else
                            <span class="item__unavail">Belum Tersedia</span>
                        @endif
                    </div>
                        
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="page__content">
            <img src="{{ asset('storage/'. $page->file) }}">
        </div>
        
    </div>

    @push('scripts')
        <script>
            const items = document.querySelectorAll('.item__content');

            function resetOtherAudios(current) {
                items.forEach(item => {
                    if (item !== current) {
                        const audio = item.querySelector('.audio');
                        const playBtn = item.querySelector('.play-btn');
                        const pauseBtn = item.querySelector('.pause-btn');

                        audio.pause();
                        audio.currentTime = 0;
                        pauseBtn.style.display = 'none';
                        playBtn.style.display = 'inline-block';
                    }
                });
            }

            items.forEach(item => {
                const playBtn = item.querySelector('.play-btn');
                const pauseBtn = item.querySelector('.pause-btn');
                const audio = item.querySelector('.audio');

                item.addEventListener('click', (e) => {
                    e.stopPropagation(); // cegah bubbling aneh
                    e.preventDefault();   // pastikan tidak ada submit default

                    if (audio.paused) {
                        resetOtherAudios(item);
                        audio.currentTime = 0;
                        audio.play();
                        playBtn.style.display = 'none';
                        pauseBtn.style.display = 'inline-block';
                    } else {
                        audio.pause();
                        pauseBtn.style.display = 'none';
                        playBtn.style.display = 'inline-block';
                    }
                });

                audio.addEventListener('ended', () => {
                    pauseBtn.style.display = 'none';
                    playBtn.style.display = 'inline-block';
                });
            });
        </script>
    @endpush
    
</x-layout.app>
