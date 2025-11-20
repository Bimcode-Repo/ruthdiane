<!-- Menu mobile fullscreen -->
<div
    id="mobile-menu"
    class="fixed inset-0 bg-background z-[9999] md:hidden transition-opacity duration-300 opacity-0 pointer-events-none"
>
    <!-- Menu centré -->
    <nav class="flex flex-col items-center justify-center h-screen w-full gap-8 text-[28px] font-andada font-semibold relative z-10">
        <a
            href="{{ route('home') }}"
            class="mobile-menu-link !text-light {{ $active === 'home' ? '!text-primary' : 'hover:!text-primary transition-colors duration-300' }}"
            style="color: #F5F3EF !important;"
        >
            {{ __('messages.home') }}
        </a>
        <a
            href="{{ route('our-style') }}"
            class="mobile-menu-link !text-light {{ $active === 'our-style' ? '!text-primary' : 'hover:!text-primary transition-colors duration-300' }}"
            style="color: #F5F3EF !important;"
        >
            {{ __('messages.our_style') }}
        </a>
        <a
            href="{{ route('about') }}"
            class="mobile-menu-link !text-light {{ $active === 'about' ? '!text-primary' : 'hover:!text-primary transition-colors duration-300' }}"
            style="color: #F5F3EF !important;"
        >
            {{ __('messages.about') }}
        </a>
        <a
            href="{{ route('contact') }}"
            class="mobile-menu-link !text-light {{ $active === 'contact' ? '!text-primary' : 'hover:!text-primary transition-colors duration-300' }}"
            style="color: #F5F3EF !important;"
        >
            {{ __('messages.contact') }}
        </a>
    </nav>
</div>

<!-- Bouton fermeture - positionné en dehors du menu, tout en haut à droite -->
<button
    id="mobile-menu-close"
    class="fixed top-4 right-4 md:top-6 md:right-6 text-light hover:text-primary transition-colors duration-300 z-[10000] md:hidden opacity-0 pointer-events-none"
>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>
