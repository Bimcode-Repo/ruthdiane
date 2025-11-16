<div>
<!-- Section slider hero -->
<div class="h-screen relative overflow-hidden">
    <!-- Slider d'images -->
    <div class="absolute inset-0">
        <!-- Image 1 -->
        <img
            src="{{ asset('medias/images/home/hero-home-1.png') }}"
            alt="Ruth Diane - Interior Design 1"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $currentSlide === 0 ? 'opacity-100' : 'opacity-0' }}"
        >
        <!-- Image 2 -->
        <img
            src="{{ asset('medias/images/home/hero-home-2.png') }}"
            alt="Ruth Diane - Interior Design 2"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $currentSlide === 1 ? 'opacity-100' : 'opacity-0' }}"
        >
        <!-- Image 3 -->
        <img
            src="{{ asset('medias/images/home/hero-home-3.png') }}"
            alt="Ruth Diane - Interior Design 3"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 {{ $currentSlide === 2 ? 'opacity-100' : 'opacity-0' }}"
        >
    </div>

    <!-- Effet de flou par-dessus les images -->
    <div class="absolute inset-0 pointer-events-none">
        <img
            src="{{ asset('medias/images/blur/blurd.png') }}"
            alt="Blur Effect"
            class="w-full h-full object-cover"
        >
    </div>

    <!-- Overlay sombre optionnel pour améliorer la lisibilité du texte -->
    <div class="absolute inset-0 bg-background/30"></div>

    <!-- Bordure blanche gauche espacée du bord -->
    <div class="absolute left-2 md:left-8 top-0 h-full w-px bg-light pointer-events-none z-10"></div>

    <!-- Sélecteur de langue en haut à droite -->
    <nav class="absolute top-4 md:top-12 right-4 md:right-16 z-20 flex gap-3 md:gap-6">
        <button
            wire:click="setLanguage('FR')"
            class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === 'FR' ? 'underline underline-offset-4' : '' }}">
            FR
        </button>
        <button
            wire:click="setLanguage('EN')"
            class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === 'EN' ? 'underline underline-offset-4' : '' }}">
            EN
        </button>
        <button
            wire:click="setLanguage('ES')"
            class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === 'ES' ? 'underline underline-offset-4' : '' }}">
            ES
        </button>
        <button
            wire:click="setLanguage('IT')"
            class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === 'IT' ? 'underline underline-offset-4' : '' }}">
            IT
        </button>
    </nav>

    <!-- Menu de navigation à gauche -->
    <nav class="absolute left-4 md:left-16 top-1/2 -translate-y-1/2 z-20">
        <!-- Logo -->
        <div class="mb-6 md:mb-8">
            <img
                src="{{ asset('medias/images/logo/logo.svg') }}"
                alt="Ruth Diane Logo"
                class="w-[28px] h-[60px] md:w-[35px] md:h-[75px]"
            >
        </div>

        <!-- Menu items -->
        <ul class="space-y-4 md:space-y-6">
            <li class="relative">
                <!-- Trait horizontal sur le border au niveau de Home (centré comme un +) -->
                <div class="absolute left-[-16.5px] md:left-[-40.5px] top-1/2 -translate-y-1/2 w-[15px] h-px bg-light"></div>
                <a href="/" class="text-light text-[24px] md:text-[40px] font-bold hover:text-primary transition-colors duration-300">
                    {{ __('messages.home') }}
                </a>
            </li>
            <li>
                <a href="/projects" class="text-light text-[24px] md:text-[40px] font-bold hover:text-primary transition-colors duration-300">
                    {{ __('messages.projects') }}
                </a>
            </li>
            <li>
                <a href="/about" class="text-light text-[24px] md:text-[40px] font-bold hover:text-primary transition-colors duration-300">
                    {{ __('messages.about') }}
                </a>
            </li>
            <li>
                <a href="/contact" class="text-light text-[24px] md:text-[40px] font-bold hover:text-primary transition-colors duration-300">
                    {{ __('messages.contact') }}
                </a>
            </li>
        </ul>
    </nav>

    <!-- Chevron de navigation droite -->
    <button
        wire:click="nextSlide"
        class="absolute right-4 md:right-16 top-1/2 -translate-y-1/2 z-20 text-light hover:text-primary transition-colors duration-300 group"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.5" stroke="currentColor" class="w-[60px] h-[60px] md:w-[100px] md:h-[100px]">
            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
    </button>

    <!-- Section de navigation en bas -->
    <div class="absolute bottom-6 md:bottom-12 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center">
        <!-- Texte "scroll" -->
        <p class="text-light text-[16px] md:text-[20px] tracking-wider mb-[15px] md:mb-[20px]">{{ __('messages.scroll') }}</p>

        <!-- Barre verticale -->
        <div class="w-px h-[35px] md:h-[47px] bg-light mb-[30px] md:mb-[45px]"></div>

        <!-- Indicateurs de pagination (dots) -->
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

    <!-- Icônes réseaux sociaux en bas à droite -->
    <div class="absolute bottom-[20px] md:bottom-[40px] right-4 md:right-16 z-20 flex gap-4 md:gap-6">
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img src="{{ asset('assets/icons/linkedin.svg') }}" alt="LinkedIn" class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]">
        </a>
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img src="{{ asset('assets/icons/instagram.svg') }}" alt="Instagram" class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]">
        </a>
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img src="{{ asset('assets/icons/facebook.svg') }}" alt="Facebook" class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]">
        </a>
    </div>
</div>

<!-- Section texte avec fond primary -->
<div class="h-[50vh] bg-primary flex items-center justify-center px-8 md:px-16">
    <p class="text-background text-[28px] md:text-[40px] text-center max-w-4xl" style="font-family: 'Joan', serif;">
        {{ __('messages.lorem_medium') }}
    </p>
</div>

<!-- Section Notre Style -->
<div class="bg-background min-h-screen">
    <div class="max-w-8xl mx-auto px-4 md:px-8 py-12 md:py-16">
        <!-- Header Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
            <!-- Left: Title -->
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                <h2 class="text-[40px] md:text-[60px] text-light font-bold">{{ __('messages.our_style') }}</h2>
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <!-- Right: Description -->
            <div>
                <p class="text-light text-[18px] md:text-[25px] leading-relaxed" style="font-family: 'Joan', serif;">
                    {{ __('messages.lorem_medium') }}
                </p>
            </div>
        </div>

        <!-- Images Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
            <!-- Image 1 - Large -->
            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-1.png') }}"
                     alt="Interior 1"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-light">Lorem ipsum dolor</p>
            </div>

            <!-- Image 2 - Large -->
            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-2.png') }}"
                     alt="Interior 2"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-light">Lorem ipsum dolor</p>
            </div>
        </div>

        <!-- Bottom Row - 3 Images -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            <!-- Image 3 -->
            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-3.png') }}"
                     alt="Interior 3"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-light">Lorem ipsum dolor</p>
            </div>

            <!-- Image 4 -->
            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-4.png') }}"
                     alt="Interior 4"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-light">Lorem ipsum dolor</p>
            </div>

            <!-- Image 5 -->
            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-5.png') }}"
                     alt="Interior 5"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-light">Lorem ipsum dolor</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="flex flex-col md:flex-row justify-between items-center mt-12 md:mt-16 gap-8 md:gap-6">
            <!-- Left: Social -->
            <div class="flex flex-col md:flex-row items-center gap-2 md:gap-4">
                <p class="text-light text-[16px] md:text-[25px] text-center md:text-left">{{ __('messages.see_all_styles') }}</p>
                <a href="#" class="flex items-center gap-2 md:gap-3 group" aria-label="Instagram">
                    <img src="{{ asset('assets/icons/instagram_primary.svg') }}" alt="Instagram" class="w-5 h-5 md:w-7 md:h-7 group-hover:opacity-80 transition-opacity">
                    <span class="text-primary text-[16px] md:text-[25px] group-hover:opacity-80 transition-opacity">{{ __('messages.instagram') }}</span>
                </a>
            </div>

            <!-- Right: CTA -->
            <a href="#" class="flex items-center gap-2 md:gap-4 text-primary hover:opacity-80 transition-opacity group">
                <span class="text-[16px] md:text-[25px]">{{ __('messages.discover_more') }}</span>
                <svg class="w-6 h-6 md:w-8 md:h-8 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Section Partenaires -->
<div class="bg-[#C4A882] h-[200px] overflow-hidden relative flex items-center">
    <div class="flex gap-12 md:gap-20 animate-scroll">
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">{{ __('messages.partner_logo') }}</div>
        <div class="text-[#3D3935] text-[30px] font-bold whitespace-nowrap">{{ __('messages.partner_logo') }}</div>
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">{{ __('messages.partner_logo') }}</div>
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">{{ __('messages.partner_logo') }}</div>
        <!-- Duplication pour boucle infinie -->
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">{{ __('messages.partner_logo') }}</div>
        <div class="text-[#3D3935] text-[30px] font-bold whitespace-nowrap">{{ __('messages.partner_logo') }}</div>
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">{{ __('messages.partner_logo') }}</div>
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">{{ __('messages.partner_logo') }}</div>
    </div>
</div>

<!-- Section Services -->
<div class="bg-background py-8 md:py-[60px]">
    <div class="max-w-8xl mx-auto px-[20px] md:px-[40px]">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between mb-8 md:mb-16 gap-6">
            <!-- Left: Title -->
            <div class="flex flex-col md:flex-row md:items-baseline gap-3 md:gap-6">
                <div class="w-[40px] md:w-16 h-[1px] bg-white self-center md:self-auto"></div>
                <h1 class="text-[40px] md:text-[60px] text-white font-bold leading-none">{{ __('messages.our_services') }}</h1>
            </div>

            <!-- Right: CTA -->
            <div class="flex items-end md:pb-2">
                <a href="#" class="flex items-center gap-3 text-[#C4A882] hover:opacity-80 transition-opacity group">
                    <span class="text-[18px] md:text-[25px] leading-none">{{ __('messages.contact_us') }}</span>
                    <svg class="w-5 h-5 md:w-6 md:h-6 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Service 1 - Image Left, Text Right -->
        <div class="flex flex-col lg:flex-row gap-0 mb-8 md:mb-12 bg-background-darker">
            <!-- Image -->
            <div class="overflow-hidden lg:w-[818px] flex-shrink-0">
                <img src="{{ asset('medias/images/services/service-1.png') }}"
                     alt="Service 1"
                     class="w-full h-[250px] md:h-[400px] object-cover">
            </div>

            <!-- Content -->
            <div class="flex flex-col justify-center py-[20px] px-[20px] md:py-[25px] md:px-[40px] md:h-[400px] flex-1">
                <h2 class="text-[28px] md:text-4xl text-white font-semibold mb-[30px] md:mb-[60px]">{{ __('messages.lorem_short') }}</h2>
                <p class="text-white text-[18px] md:text-[22px] leading-relaxed mb-[30px] md:mb-[60px]" style="font-family: 'Joan', serif;">
                    {{ __('messages.lorem_long') }}
                </p>
                <div class="flex flex-col md:flex-row gap-3 md:gap-4">
                    <button class="bg-[#C4A882] text-[#3D3935] px-6 py-2.5 md:px-8 md:py-3 hover:opacity-90 transition-opacity text-sm md:text-base">
                        {{ __('messages.lorem_button') }}
                    </button>
                    <button class="bg-[#C4A882] text-[#3D3935] px-6 py-2.5 md:px-8 md:py-3 hover:opacity-90 transition-opacity text-sm md:text-base">
                        {{ __('messages.lorem_button') }}
                    </button>
                </div>
            </div>
        </div>

        <!-- Service 2 - Text Left, Image Right -->
        <div class="flex flex-col lg:flex-row gap-0 mb-8 md:mb-12 bg-background-darker">
            <!-- Content -->
            <div class="flex flex-col justify-center py-[20px] px-[20px] md:py-[25px] md:px-[40px] md:h-[400px] flex-1 order-2 lg:order-1">
                <h2 class="text-[28px] md:text-4xl text-white font-semibold mb-[30px] md:mb-[60px]">{{ __('messages.lorem_short') }}</h2>
                <p class="text-white text-[18px] md:text-[22px] leading-relaxed mb-[30px] md:mb-[60px]" style="font-family: 'Joan', serif;">
                    {{ __('messages.lorem_long') }}
                </p>
                <div class="flex flex-col md:flex-row gap-3 md:gap-4">
                    <button class="bg-[#C4A882] text-[#3D3935] px-6 py-2.5 md:px-8 md:py-3 hover:opacity-90 transition-opacity text-sm md:text-base">
                        {{ __('messages.lorem_button') }}
                    </button>
                    <button class="bg-[#C4A882] text-[#3D3935] px-6 py-2.5 md:px-8 md:py-3 hover:opacity-90 transition-opacity text-sm md:text-base">
                        {{ __('messages.lorem_button') }}
                    </button>
                </div>
            </div>

            <!-- Image -->
            <div class="overflow-hidden lg:w-[838px] flex-shrink-0 order-1 lg:order-2">
                <img src="{{ asset('medias/images/services/service-2.png') }}"
                     alt="Service 2"
                     class="w-full h-[250px] md:h-[400px] object-cover">
            </div>
        </div>

        <!-- Banner Section -->
        <div class="mt-8 md:mt-12">
            <div class="bg-[#C4A882] py-8 md:py-16 px-6 md:px-8 flex flex-col lg:flex-row justify-between items-center gap-6 md:gap-8">
                <!-- Left: Title and Subtitle -->
                <div>
                    <h2 class="text-3xl md:text-5xl text-[#3D3935] font-light mb-2">{{ __('messages.lorem_banner_title') }}</h2>
                    <p class="text-[#3D3935] text-base md:text-lg">{{ __('messages.lorem_short') }}</p>
                </div>

                <!-- Right: Buttons -->
                <div class="flex flex-col md:flex-row gap-3 md:gap-4 w-full lg:w-auto">
                    <button class="border-2 border-[#3D3935] text-[#3D3935] px-8 md:px-10 h-[70px] hover:bg-[#3D3935] hover:text-[#C4A882] transition-all text-sm md:text-base">
                        {{ __('messages.lorem_button') }}
                    </button>
                    <button class="bg-[#3D3935] text-white px-8 md:px-10 h-[70px] hover:opacity-90 transition-opacity text-sm md:text-base">
                        {{ __('messages.lorem_button') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section Female Owned -->
<div class="flex flex-col lg:flex-row lg:h-[470px]">
    <!-- Left: Image -->
    <div class="w-full lg:w-[470px] h-[300px] lg:h-[470px] flex-shrink-0">
        <img src="{{ asset('medias/images/about/female-owner.png') }}"
             alt="Female Owner"
             class="w-full h-full object-cover">
    </div>

    <!-- Right: Content with Pink Background -->
    <div class="bg-[#E8C5CA] flex flex-col justify-center px-6 md:px-12 lg:px-[80px] py-8 md:py-12 lg:py-[150px] flex-1">
        <div class="w-full">
            <!-- Title -->
            <div class="mb-6 md:mb-8 lg:mb-10">
                <h1 class="text-[32px] md:text-[40px] lg:text-[50px] text-[#3D3935] font-semibold leading-tight">
                    {{ __('messages.female_owned_title') }}
                </h1>
            </div>

            <!-- Description -->
            <p class="text-[20px] md:text-[24px] lg:text-[30px] text-[#3D3935] leading-relaxed">
                {{ __('messages.female_owned_text') }}
            </p>
        </div>
    </div>
</div>

<!-- Section À propos -->
<div class="bg-background py-8 md:py-[60px]">
    <div class="max-w-8xl mx-auto px-[20px] md:px-[40px]">
        <!-- Header Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
            <!-- Left: Title -->
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                <h2 class="text-[40px] md:text-[60px] text-light font-bold">{{ __('messages.about_title') }}</h2>
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <!-- Right: Description -->
            <div>
                <p class="text-light text-[18px] md:text-[25px] leading-relaxed" style="font-family: 'Joan', serif;">
                    {{ __('messages.lorem_medium') }}
                </p>
            </div>
        </div>

        <!-- Full Width Image -->
        <div class="w-full h-[400px] md:h-[550px] lg:h-[650px] overflow-hidden relative">
            <img src="{{ asset('medias/images/about/about-main.png') }}"
                 alt="À propos"
                 class="w-full h-full object-cover">

            <!-- Text Overlay -->
            <div class="absolute inset-0 flex items-center justify-center px-6 md:px-16">
                <p class="text-light text-[20px] md:text-[40px] text-center max-w-5xl leading-snug md:leading-relaxed" style="font-family: 'Joan', serif;">
                    {{ __('messages.curatorial_text') }}
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Blog Section -->
<div class="bg-background-darker py-12 md:py-16 lg:py-20">
    <!-- Blog Header -->
    <div class="max-w-8xl mx-auto px-6 md:px-12">
        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-8 md:mb-16">
            <h1 class="text-[40px] md:text-6xl lg:text-7xl text-white font-light">{{ __('messages.blog') }}</h1>
            <div class="w-[40px] md:w-16 h-[1px] bg-white md:order-first"></div>
        </div>
    </div>

    <!-- Blog Carousel (outside max-w-8xl) -->
    <div class="relative px-4 md:px-8" x-data="{
        showLeftArrow: false,
        showRightArrow: true,
        currentScroll: 0,
        updateArrows() {
            const slider = this.$refs.slider;
            this.showLeftArrow = slider.scrollLeft > 0;
            this.showRightArrow = slider.scrollLeft < (slider.scrollWidth - slider.clientWidth - 10);
            this.currentScroll = slider.scrollLeft;
        },
        isCardPartial(index) {
            const slider = this.$refs.slider;
            const cardWidth = 530;
            const gap = 24;
            const cardPosition = index * (cardWidth + gap);
            const cardEnd = cardPosition + cardWidth;
            const visibleStart = this.currentScroll;
            const visibleEnd = this.currentScroll + slider.clientWidth;

            // Card is partial if it's cut off on the left or right
            const partialLeft = cardPosition < visibleStart && cardEnd > visibleStart;
            const partialRight = cardPosition < visibleEnd && cardEnd > visibleEnd;

            return partialLeft || partialRight;
        }
    }" x-init="updateArrows()">
        <!-- Blog Cards Slider -->
        <div x-ref="slider" @scroll="updateArrows()" class="flex gap-4 md:gap-6 overflow-x-hidden scroll-smooth relative">
            <!-- Card 1 -->
            <div class="relative group overflow-hidden w-[280px] md:w-[530px] h-[195px] md:h-[369px] flex-shrink-0">
                <img src="{{ asset('medias/images/blog/blog-1.png') }}"
                     alt="Blog 1"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                <!-- Content -->
                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 transition-opacity duration-300" :class="isCardPartial(0) ? 'opacity-50' : 'opacity-100'">
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px]" style="font-family: 'Andada Pro', serif; font-weight: 600;">{{ __('messages.blog_card_title') }}</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed" style="font-family: 'Joan', serif;">
                        {{ __('messages.blog_card_text') }}
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="relative group overflow-hidden w-[280px] md:w-[530px] h-[195px] md:h-[369px] flex-shrink-0">
                <img src="{{ asset('medias/images/blog/blog-2.png') }}"
                     alt="Blog 2"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                <!-- Content -->
                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 transition-opacity duration-300" :class="isCardPartial(1) ? 'opacity-50' : 'opacity-100'">
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px]" style="font-family: 'Andada Pro', serif; font-weight: 600;">{{ __('messages.blog_card_title') }}</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed" style="font-family: 'Joan', serif;">
                        {{ __('messages.blog_card_text') }}
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="relative group overflow-hidden w-[280px] md:w-[530px] h-[195px] md:h-[369px] flex-shrink-0">
                <img src="{{ asset('medias/images/blog/blog-3.png') }}"
                     alt="Blog 3"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                <!-- Content -->
                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 transition-opacity duration-300" :class="isCardPartial(2) ? 'opacity-50' : 'opacity-100'">
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px]" style="font-family: 'Andada Pro', serif; font-weight: 600;">{{ __('messages.blog_card_title') }}</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed" style="font-family: 'Joan', serif;">
                        {{ __('messages.blog_card_text') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows (Hero style) -->
        <button x-show="showLeftArrow" x-transition @click="$refs.slider.scrollBy({left: window.innerWidth < 768 ? -284 : -536, behavior: 'smooth'})" class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-10 text-light hover:text-primary transition-colors duration-300 group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.5" stroke="currentColor" class="w-[60px] h-[60px] md:w-[100px] md:h-[100px] rotate-180">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <button x-show="showRightArrow" x-transition @click="$refs.slider.scrollBy({left: window.innerWidth < 768 ? 284 : 536, behavior: 'smooth'})" class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-10 text-light hover:text-primary transition-colors duration-300 group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.5" stroke="currentColor" class="w-[60px] h-[60px] md:w-[100px] md:h-[100px]">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </div>
</div>

</div>
