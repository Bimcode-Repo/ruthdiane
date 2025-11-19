<nav class="flex gap-3 md:gap-6">
    <button
        @if(!session('visited'))
            data-aos="fade-down" data-aos-delay="1000"
        @endif
        wire:click="setLanguage('FR')"
        class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === 'FR' ? 'underline underline-offset-4' : '' }}">
        FR
    </button>
    <button
        @if(!session('visited'))
            data-aos="fade-down" data-aos-delay="1300"
        @endif
        wire:click="setLanguage('EN')"
        class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === 'EN' ? 'underline underline-offset-4' : '' }}">
        EN
    </button>
    <button
        @if(!session('visited'))
            data-aos="fade-down" data-aos-delay="1600"
        @endif
        wire:click="setLanguage('ES')"
        class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === 'ES' ? 'underline underline-offset-4' : '' }}">
        ES
    </button>
    <button
        @if(!session('visited'))
            data-aos="fade-down" data-aos-delay="1900"
        @endif
        wire:click="setLanguage('IT')"
        class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === 'IT' ? 'underline underline-offset-4' : '' }}">
        IT
    </button>
</nav>
