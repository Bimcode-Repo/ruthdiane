<div>
<!-- Section hero -->
<div class="h-screen relative overflow-hidden">
    <!-- Image de fond -->
    <div class="absolute inset-0">
        <img
            src="{{ asset('medias/images/about/hero-about.png') }}"
            alt="À propos"
            class="w-full h-full object-cover"
        >
    </div>

    <!-- Effet de flou par-dessus l'image -->
    <div class="absolute inset-0 pointer-events-none">
        <img
            src="{{ asset('medias/images/blur/blurd.png') }}"
            alt="Blur Effect"
            class="w-full h-full object-cover"
        >
    </div>

    <!-- Overlay sombre optionnel pour améliorer la lisibilité du texte -->
    <div class="absolute inset-0 bg-background/30"></div>

    <!-- Header avec bordure blanche en bas -->
    <div class="absolute top-0 left-0 right-0 h-[80px] md:h-[115px] border-b border-light z-20 flex items-center justify-between px-4 md:px-16">
        <!-- Logo et texte en haut à gauche -->
        <a href="/" class="flex items-center gap-2 md:gap-4 hover:opacity-80 transition-opacity">
            <img src="{{ asset('medias/images/logo/logo.svg') }}" alt="Ruth Safdie Interiors" class="w-[12px] h-[26px] md:w-[15px] md:h-[33px]">
            <div class="text-left">
                <h3 class="text-light text-[14px] md:text-[20px] font-semibold leading-none" style="font-family: 'Andada Pro', serif;">Ruth Safdie Interiors</h3>
                <p class="text-light text-[8px] md:text-[10px] leading-none" style="font-family: 'Joan', serif;">Unlock The Art Of Refined Interiors</p>
            </div>
        </a>

        <!-- Sélecteur de langue en haut à droite -->
        <nav class="flex gap-3 md:gap-6">
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
    </div>

    <!-- Menu Burger Button (Mobile Only) -->
    <div class="absolute top-[95px] left-4 z-30 md:hidden" x-data="{ open: false }">
        <button @click="open = !open" class="text-light hover:text-primary transition-colors duration-300">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Mobile Menu -->
        <div x-show="open" @click.away="open = false" x-transition class="absolute top-12 left-0">
            <nav class="flex flex-col gap-4 text-light text-[16px]" style="font-family: 'Andada Pro', serif;">
                <a href="/" class="hover:text-primary transition-colors duration-300 whitespace-nowrap">{{ __('messages.home') }}</a>
                <a href="/projects" class="hover:text-primary transition-colors duration-300 whitespace-nowrap">{{ __('messages.projects') }}</a>
                <a href="/notre-style" class="hover:text-primary transition-colors duration-300 whitespace-nowrap">{{ __('messages.our_style') }}</a>
                <a href="/about" class="text-primary whitespace-nowrap">{{ __('messages.about') }}</a>
                <a href="/contact" class="hover:text-primary transition-colors duration-300 whitespace-nowrap">{{ __('messages.contact') }}</a>
            </nav>
        </div>
    </div>

    <!-- Navigation en haut à gauche sous le header (Desktop Only) -->
    <div class="absolute top-[130px] left-16 z-20 hidden md:block">
        <nav class="flex items-center gap-[60px] text-light text-[22px]" style="font-family: 'Andada Pro', serif;">
            <a href="/" class="hover:text-primary transition-colors duration-300">{{ __('messages.home') }}</a>
            <a href="/projects" class="hover:text-primary transition-colors duration-300">{{ __('messages.projects') }}</a>
            <a href="/notre-style" class="hover:text-primary transition-colors duration-300">{{ __('messages.our_style') }}</a>
            <a href="/about" class="relative hover:text-primary transition-colors duration-300">
                <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
                {{ __('messages.about') }}
            </a>
            <a href="/contact" class="hover:text-primary transition-colors duration-300">{{ __('messages.contact') }}</a>
        </nav>
    </div>

    <!-- Icônes réseaux sociaux en haut à droite sous le header -->
    <div class="absolute top-[95px] md:top-[130px] right-4 md:right-16 z-20 flex gap-4 md:gap-6">
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img src="{{ asset('assets/icons/linkedin.svg') }}" alt="LinkedIn" class="w-[20px] h-[20px] md:w-[28px] md:h-[28px]">
        </a>
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img src="{{ asset('assets/icons/instagram.svg') }}" alt="Instagram" class="w-[20px] h-[20px] md:w-[28px] md:h-[28px]">
        </a>
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img src="{{ asset('assets/icons/facebook.svg') }}" alt="Facebook" class="w-[20px] h-[20px] md:w-[28px] md:h-[28px]">
        </a>
    </div>

    <!-- Titre centré -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 px-4">
        <h1 class="text-light text-[40px] md:text-[60px] font-bold text-center" style="font-family: 'Andada Pro', serif;">{{ __('messages.about_title') }}</h1>
    </div>

    <!-- Section de navigation en bas -->
    <div class="absolute bottom-6 md:bottom-12 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center">
        <!-- Texte "scroll" -->
        <p class="text-light text-[16px] md:text-[20px] tracking-wider mb-[15px] md:mb-[20px]">{{ __('messages.scroll') }}</p>

        <!-- Barre verticale -->
        <div class="w-px h-[35px] md:h-[47px] bg-light"></div>
    </div>
</div>

<!-- Section texte avec fond primary -->
<div class="h-[50vh] bg-primary flex items-center justify-center px-8 md:px-16">
    <p class="text-background text-[28px] md:text-[40px] text-center max-w-4xl" style="font-family: 'Joan', serif;">
        {{ __('messages.lorem_medium') }}
    </p>
</div>

<!-- Section Lorem Ipsum -->
<div class="bg-background">
    <div class="max-w-8xl mx-auto px-4 md:px-8 py-12 md:py-16">
        <!-- Header Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
            <!-- Left: Title -->
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                <h2 class="text-[40px] md:text-[60px] text-light font-bold">{{ __('messages.lorem_title') }}</h2>
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <!-- Right: Description -->
            <div>
                <p class="text-light text-[18px] md:text-[25px] leading-relaxed" style="font-family: 'Joan', serif;">
                    {{ __('messages.lorem_medium') }}
                </p>
            </div>
        </div>

        <!-- Images Grid - Only 2 images -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
            <!-- Image 1 - Large -->
            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-1.png') }}"
                     alt="Interior 1"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-light">{{ __('messages.lorem_short') }}</p>
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
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-light">{{ __('messages.lorem_short') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Section Partenaires -->
<div class="bg-[#C4A882] h-[200px] overflow-hidden relative flex items-center">
    <div class="flex gap-12 md:gap-20 animate-scroll">
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">Logo Partenaire</div>
        <div class="text-[#3D3935] text-[30px] font-bold whitespace-nowrap">Logo Partenaire</div>
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">Logo Partenaire</div>
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">Logo Partenaire</div>
        <!-- Duplication pour boucle infinie -->
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">Logo Partenaire</div>
        <div class="text-[#3D3935] text-[30px] font-bold whitespace-nowrap">Logo Partenaire</div>
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">Logo Partenaire</div>
        <div class="text-[#3D3935] text-[30px] font-bold opacity-70 whitespace-nowrap">Logo Partenaire</div>
    </div>
</div>

<!-- Section Services -->
<div class="bg-background py-8 md:py-[60px] lg:py-[150px]">
    <div class="max-w-8xl mx-auto px-[20px] md:px-[40px]">
        <!-- Header Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
            <!-- Left: Title -->
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                <h2 class="text-[40px] md:text-[60px] text-light font-bold">Lorem Ipsum</h2>
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <!-- Right: CTA -->
            <div class="flex items-center justify-start lg:justify-end">
                <a href="#" class="flex items-center gap-3 text-[#C4A882] hover:opacity-80 transition-opacity group">
                    <span class="text-[18px] md:text-[25px] leading-none">Contactez-nous</span>
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
                <h2 class="text-[28px] md:text-4xl text-white font-semibold mb-[30px] md:mb-[60px]">Lorem ipsum dolor</h2>
                <p class="text-white text-[18px] md:text-[22px] leading-relaxed mb-[30px] md:mb-[60px]" style="font-family: 'Joan', serif;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sem libero, commodo quis massa a, mattis laoreet tortor. Nunc volutpat nisi sit amet gravida.
                </p>
                <div class="flex flex-col md:flex-row gap-3 md:gap-4">
                    <button class="bg-[#C4A882] text-[#3D3935] px-6 py-2.5 md:px-8 md:py-3 hover:opacity-90 transition-opacity text-sm md:text-base">
                        Lorem ipsum dolor
                    </button>
                    <button class="bg-[#C4A882] text-[#3D3935] px-6 py-2.5 md:px-8 md:py-3 hover:opacity-90 transition-opacity text-sm md:text-base">
                        Lorem ipsum dolor
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
                <h2 class="text-[40px] md:text-[60px] text-light font-bold">{{ __('messages.lorem_title') }}</h2>
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
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px]" style="font-family: 'Andada Pro', serif; font-weight: 600;">Lorem ipsum dolor</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed" style="font-family: 'Joan', serif;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis et neque eu cursus.
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
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px]" style="font-family: 'Andada Pro', serif; font-weight: 600;">Lorem ipsum dolor</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed" style="font-family: 'Joan', serif;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis et neque eu cursus.
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
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px]" style="font-family: 'Andada Pro', serif; font-weight: 600;">Lorem ipsum dolor</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed" style="font-family: 'Joan', serif;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis et neque eu cursus.
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
