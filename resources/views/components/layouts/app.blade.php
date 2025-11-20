<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Ruth Diane - Interior Design' }}</title>

    <!-- Google Fonts - Andada Pro & Joan Regular -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:wght@400;500;600;700;800&family=Joan&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('medias/images/logo/favicon.png') }}">

    <!-- Preload des images critiques pour un chargement rapide -->
    <link rel="preload" as="image" href="{{ asset('medias/images/projects/project-1.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('medias/images/projects/project-2.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('medias/images/projects/project-3.jpg') }}">
    <link rel="preload" as="image" href="{{ asset('medias/images/projects/hero-projects.jpg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    {{-- Injection conditionnelle des scripts selon le consentement RGPD --}}
    @php
        $sessionId = session()->getId();
        $consent = \App\Models\CookieConsent::getConsent($sessionId);
    @endphp

    @if($consent)
        {{-- Scripts nécessaires (toujours chargés) --}}
        @foreach(\App\Models\AnalyticsScript::active()->category('necessary')->ordered()->get() as $script)
            {!! $script->script_code !!}
        @endforeach

        {{-- Scripts analytiques (si consentis) --}}
        @if($consent->analytics)
            @foreach(\App\Models\AnalyticsScript::active()->category('analytics')->ordered()->get() as $script)
                {!! $script->script_code !!}
            @endforeach
        @endif

        {{-- Scripts marketing (si consentis) --}}
        @if($consent->marketing)
            @foreach(\App\Models\AnalyticsScript::active()->category('marketing')->ordered()->get() as $script)
                {!! $script->script_code !!}
            @endforeach
        @endif
    @else
        {{-- Aucun consentement : uniquement les scripts nécessaires --}}
        @foreach(\App\Models\AnalyticsScript::active()->category('necessary')->ordered()->get() as $script)
            {!! $script->script_code !!}
        @endforeach
    @endif
</head>
<body>
    <main id="swup" class="transition-fade">
        {{ $slot }}
    </main>

    @if(!request()->is('admin*'))
    <!-- Footer -->
    <footer class="bg-background py-12 md:py-16">
        <div class="max-w-8xl mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-center gap-8 md:gap-12">
                <!-- Left Section: Logo + Titles -->
                <a href="{{ route('home', ['locale' => currentLocale()]) }}" class="flex items-center gap-4 hover:opacity-80 transition-opacity">
                    <img src="{{ asset('medias/images/logo/logo.svg') }}" alt="Ruth Safdie Interiors" class="w-[15px] h-[33px]">
                    <div class="text-left">
                        <h3 class="text-light text-[20px] font-semibold leading-none font-andada">Ruth Safdie Interiors</h3>
                        <p class="text-light text-[10px] leading-none font-joan">Unlock The Art Of Refined Interiors</p>
                    </div>
                </a>

                <!-- Right Section: Social Icons + Mentions légales -->
                <div class="flex items-center gap-6">
                    <!-- Social Icons -->
                    @php
                        $linkedinUrl = \App\Models\Setting::get('linkedin_url', '');
                        $instagramUrl = \App\Models\Setting::get('instagram_url', '');
                        $facebookUrl = \App\Models\Setting::get('facebook_url', '');
                    @endphp
                    <div class="flex items-center gap-3">
                        @if($linkedinUrl)
                            <a href="{{ $linkedinUrl }}" target="_blank" rel="noopener noreferrer" class="text-light hover:text-primary transition-colors duration-300">
                                <img src="{{ asset('assets/icons/linkedin.svg') }}" alt="LinkedIn" class="w-[21px] h-[21px]">
                            </a>
                        @endif
                        @if($instagramUrl)
                            <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" class="text-light hover:text-primary transition-colors duration-300">
                                <img src="{{ asset('assets/icons/instagram.svg') }}" alt="Instagram" class="w-[21px] h-[21px]">
                            </a>
                        @endif
                        @if($facebookUrl)
                            <a href="{{ $facebookUrl }}" target="_blank" rel="noopener noreferrer" class="text-light hover:text-primary transition-colors duration-300">
                                <img src="{{ asset('assets/icons/facebook.svg') }}" alt="Facebook" class="w-[21px] h-[21px]">
                            </a>
                        @endif
                    </div>

                    <!-- Mentions légales & Cookies -->
                    <div class="flex items-center gap-4">
                        <a href="{{ route('legal', ['locale' => currentLocale()]) }}" class="text-light hover:text-primary transition-colors duration-300 text-[14px] underline" style="font-family: 'Andada Pro', serif; font-weight: 600;">
                            {{ __('messages.legal_mentions') }}
                        </a>
                        <a href="{{ route('cookie.preferences', ['locale' => currentLocale()]) }}" class="text-light hover:text-primary transition-colors duration-300 text-[14px] underline" style="font-family: 'Andada Pro', serif; font-weight: 600;">
                            {{ __('messages.cookie_preferences') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @livewire('cookie-banner')
    @endif

    @livewireScripts
</body>
</html>
