<div class="bg-background py-16">
    <div class="max-w-8xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6" data-aos="fade-right">
                @include('components.h.title2', ['title' => __('messages.inspiration_title')])
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <div>
                <p class="text-light text-lg leading-relaxed font-joan" data-aos="fade-left">
                    {{ __('messages.inspiration_description') }}
                </p>
            </div>
        </div>

        {{-- Images statiques en grille alternée 2-3-2-3 --}}
        {{-- Première ligne: 2 images --}}
        <div data-aos="zoom-in" class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
            <div class="relative overflow-hidden">
                <img src="{{ asset('medias/images-hd/salon-3.png') }}"
                     alt="Inspiration 1"
                     class="w-full h-[300px] md:h-[400px] object-cover">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
            <div class="relative overflow-hidden">
                <img src="{{ asset('medias/images-hd/chambre-2.png') }}"
                     alt="Inspiration 2"
                     class="w-full h-[300px] md:h-[400px] object-cover">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
        </div>

        {{-- Deuxième ligne: 3 images --}}
        <div data-aos="zoom-in" class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-4 md:mb-6">
            <div class="relative overflow-hidden">
                <img src="{{ asset('medias/images-hd/cuisine-3.png') }}"
                     alt="Inspiration 3"
                     class="w-full h-[300px] md:h-[400px] object-cover">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
            <div class="relative overflow-hidden">
                <img src="{{ asset('medias/images-hd/background-2.png') }}"
                     alt="Inspiration 4"
                     class="w-full h-[300px] md:h-[400px] object-cover">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
            <div class="relative overflow-hidden">
                <img src="{{ asset('medias/images-hd/jardin-1.png') }}"
                     alt="Inspiration 5"
                     class="w-full h-[300px] md:h-[400px] object-cover">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
        </div>

        {{-- Troisième ligne: 2 images --}}
        <div data-aos="zoom-in" class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
            <div class="relative overflow-hidden">
                <img src="{{ asset('medias/images-hd/bureau-1.png') }}"
                     alt="Inspiration 6"
                     class="w-full h-[300px] md:h-[400px] object-cover">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
            <div class="relative overflow-hidden">
                <img src="{{ asset('medias/images-hd/chambre-bebe-1.png') }}"
                     alt="Inspiration 7"
                     class="w-full h-[300px] md:h-[400px] object-cover">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            </div>
        </div>

        <div data-aos="fade-in" class="flex flex-col md:flex-row justify-between items-center mt-12 md:mt-16 gap-8 md:gap-6">
            <div class="flex flex-col md:flex-row items-center gap-2 md:gap-4">
                <p class="text-light text-[16px] text-center md:text-left font-andada">{{ __('messages.see_all_styles') }}</p>
                <a href="#" class="flex items-center gap-2 md:gap-3 group" aria-label="Instagram">
                    <img src="{{ asset('assets/icons/instagram_primary.svg') }}" alt="Instagram" class="w-5 h-5 md:w-7 md:h-7 group-hover:opacity-80 transition-opacity">
                    <span class="text-primary text-[16px] group-hover:opacity-80 transition-opacity font-andada">{{ __('messages.instagram') }}</span>
                </a>
            </div>

            <a href="{{route('projects')}}" class="flex items-center gap-2 md:gap-4 text-primary hover:opacity-80 transition-opacity group">
                <span class="text-[16px] font-andada">{{ __('messages.discover_more') }}</span>
                <svg class="w-6 h-6 md:w-8 md:h-8 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</div>
