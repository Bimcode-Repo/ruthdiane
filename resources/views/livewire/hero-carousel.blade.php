<div>
    <div class="absolute inset-0">
        <img
            src="{{ asset('medias/images/home/hero-home-1.png') }}"
            alt="Ruth Diane - Interior Design 1"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $currentSlide === 0 ? 'opacity-100' : 'opacity-0' }}"
        >
        <img
            src="{{ asset('medias/images/home/hero-home-2.png') }}"
            alt="Ruth Diane - Interior Design 2"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $currentSlide === 1 ? 'opacity-100' : 'opacity-0' }}"
        >
        <img
            src="{{ asset('medias/images/home/hero-home-3.png') }}"
            alt="Ruth Diane - Interior Design 3"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $currentSlide === 2 ? 'opacity-100' : 'opacity-0' }}"
        >
    </div>

    <button
        wire:click="nextSlide"
        class="absolute right-4 md:right-16 top-1/2 -translate-y-1/2 z-20 text-light hover:text-primary transition-colors duration-300 group"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.5" stroke="currentColor" class="w-[60px] h-[60px] md:w-[100px] md:h-[100px]">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </button>

    <div class="absolute bottom-6 md:bottom-12 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center">
        <p class="text-light text-[16px] md:text-[20px] tracking-wider mb-[15px] md:mb-[20px]">{{ __('messages.scroll') }}</p>

        <div class="w-px h-[35px] md:h-[47px] bg-light mb-[30px] md:mb-[45px]"></div>

        <div class="flex gap-3 md:gap-4">
            @for ($i = 0; $i < $totalSlides; $i++)
                <button
                    wire:click="goToSlide({{ $i }})"
                    class="w-2.5 h-2.5 md:w-3 md:h-3 rounded-full transition-all duration-300 {{ $currentSlide === $i ? 'bg-primary scale-125' : 'bg-light hover:bg-light/70' }}"
                    aria-label="Aller à l'image {{ $i + 1 }}"
                ></button>
            @endfor
        </div>
    </div>
</div>
