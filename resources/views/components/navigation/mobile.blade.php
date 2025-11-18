<div class="absolute top-[95px] left-4 z-30 md:hidden" x-data="{ open: false }">
    <button @click="open = !open" class="text-light hover:text-primary transition-colors duration-300">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <div x-show="open" @click.away="open = false" x-transition class="absolute top-12 left-0">
        <nav class="flex flex-col gap-4 text-light text-[16px] font-andada">
            <a href="{{ route('home') }}" class="{{ $active === 'home' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }} whitespace-nowrap">{{ __('messages.home') }}</a>
            <a href="{{ route('our-style') }}" class="{{ $active === 'our-style' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }} whitespace-nowrap">{{ __('messages.our_style') }}</a>
            <a href="{{ route('about') }}" class="{{ $active === 'about' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }} whitespace-nowrap">{{ __('messages.about') }}</a>
            <a href="{{ route('contact') }}" class="{{ $active === 'contact' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }} whitespace-nowrap">{{ __('messages.contact') }}</a>
        </nav>
    </div>
</div>
