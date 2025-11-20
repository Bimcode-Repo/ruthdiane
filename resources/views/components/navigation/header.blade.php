<div class="absolute top-0 left-0 right-0 h-[80px] md:h-[115px] border-b border-light z-20 flex items-center justify-between px-4 md:px-16">
    <a href="{{ route('home') }}" class="flex items-center gap-2 md:gap-4 hover:opacity-80 transition-opacity">
        <img
            src="{{ asset('medias/images/logo/logo.svg') }}"
            alt="Ruth Safdie Interiors"
            class="w-[12px] h-[26px] md:w-[15px] md:h-[33px]"
            @if(!session('visited')) data-aos="zoom-in" @endif
        >
        <div class="text-left">
            <h3 class="text-light text-[14px] md:text-[20px] font-semibold leading-none font-andada"
                @if(!session('visited')) data-aos="fade-in" @endif
            >Ruth Safdie Interiors</h3>
            <p class="text-light text-[8px] md:text-[10px] leading-none font-joan"
               @if(!session('visited')) data-aos="fade-in" @endif
            >Unlock The Art Of Refined Interiors</p>
        </div>
    </a>

    <div class="flex items-center gap-4">
        @livewire('language-switcher')

        <!-- Bouton menu mobile -->
        <button
            id="mobile-menu-button"
            class="md:hidden text-light hover:text-primary transition-colors duration-300"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>
</div>
