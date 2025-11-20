<!-- Menu mobile fullscreen -->
<div
    id="mobile-menu"
    class="fixed top-0 left-0 w-screen h-screen bg-background z-[9999] md:hidden transition-opacity duration-300 opacity-0 pointer-events-none flex flex-col items-center justify-center"
>
    <!-- Contenu centré avec logo et menu -->
    <div class="flex flex-col items-center gap-8">
        <!-- Logo -->
        <img src="{{ asset('medias/images/logo/logo.svg') }}" alt="Ruth Diane" class="w-[30px] h-auto">

        <!-- Menu -->
        <nav class="flex flex-col items-center gap-8 text-[28px] font-andada font-semibold">
        <a
            href="{{ route('home') }}"
            class="mobile-menu-link text-light {{ $active === 'home' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }}"
        >
            {{ __('messages.home') }}
        </a>
        @if(!inspirationMode())
            <a
                href="{{ route('projects') }}"
                class="mobile-menu-link text-light {{ $active === 'projects' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }}"
            >
                {{ __('messages.our_style') }}
            </a>
        @endif
        <a
            href="{{ route('about') }}"
            class="mobile-menu-link text-light {{ $active === 'about' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }}"
        >
            {{ __('messages.about') }}
        </a>
        <a
            href="{{ route('contact') }}"
            class="mobile-menu-link text-light {{ $active === 'contact' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }}"
        >
            {{ __('messages.contact') }}
        </a>
        @if(blogEnabled())
            <a
                href="{{ route('blog.archive', ['locale' => currentLocale()]) }}"
                class="mobile-menu-link text-light {{ $active === 'blog' ? 'text-primary' : 'hover:text-primary transition-colors duration-300' }}"
            >
                {{ __('messages.blog') }}
            </a>
        @endif
        </nav>
    </div>

    <!-- Réseaux sociaux en bas -->
    @php
        $linkedinUrl = \App\Models\Setting::get('linkedin_url', '');
        $instagramUrl = \App\Models\Setting::get('instagram_url', '');
        $facebookUrl = \App\Models\Setting::get('facebook_url', '');
    @endphp
    <div class="absolute bottom-8 flex gap-6">
        @if($linkedinUrl)
            <a href="{{ $linkedinUrl }}" target="_blank" rel="noopener noreferrer" class="text-light hover:text-primary transition-colors duration-300">
                <img src="{{ asset('assets/icons/linkedin.svg') }}" alt="LinkedIn" class="w-[24px] h-[24px]">
            </a>
        @endif
        @if($instagramUrl)
            <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" class="text-light hover:text-primary transition-colors duration-300">
                <img src="{{ asset('assets/icons/instagram.svg') }}" alt="Instagram" class="w-[24px] h-[24px]">
            </a>
        @endif
        @if($facebookUrl)
            <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer" class="text-light hover:text-primary transition-colors duration-300">
                <img src="{{ asset('assets/icons/facebook.svg') }}" alt="Facebook" class="w-[24px] h-[24px]">
            </a>
        @endif
    </div>
</div>

<!-- Bouton fermeture -->
<button
    id="mobile-menu-close"
    class="fixed top-4 right-4 md:top-6 md:right-6 text-light hover:text-primary transition-colors duration-300 z-[10000] md:hidden opacity-0 pointer-events-none"
>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>
