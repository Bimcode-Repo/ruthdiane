<div class="bg-background">
    <div class="max-w-8xl mx-auto px-4 md:px-8 py-12 md:py-16">
        <x-sections.title
            :title="__('messages.our_style')"
            :description="__('messages.lorem_medium')"
        />

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-1.png') }}"
                     alt="Interior 1"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-andada-semibold">Lorem ipsum dolor</p>
            </div>

            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-2.png') }}"
                     alt="Interior 2"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-andada-semibold">Lorem ipsum dolor</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-3.png') }}"
                     alt="Interior 3"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-andada-semibold">Lorem ipsum dolor</p>
            </div>

            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-4.png') }}"
                     alt="Interior 4"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-andada-semibold">Lorem ipsum dolor</p>
            </div>

            <div class="relative overflow-hidden group">
                <img src="{{ asset('medias/images/styles/style-5.png') }}"
                     alt="Interior 5"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-andada-semibold">Lorem ipsum dolor</p>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center mt-12 md:mt-16 gap-8 md:gap-6">
            <div class="flex flex-col md:flex-row items-center gap-2 md:gap-4">
                <p class="text-light text-[16px] text-center md:text-left font-andada">{{ __('messages.see_all_styles') }}</p>
                <a href="#" class="flex items-center gap-2 md:gap-3 group" aria-label="Instagram">
                    <img src="{{ asset('assets/icons/instagram_primary.svg') }}" alt="Instagram" class="w-5 h-5 md:w-7 md:h-7 group-hover:opacity-80 transition-opacity">
                    <span class="text-primary text-[16px] group-hover:opacity-80 transition-opacity font-andada">{{ __('messages.instagram') }}</span>
                </a>
            </div>

            <a href="#" class="flex items-center gap-2 md:gap-4 text-primary hover:opacity-80 transition-opacity group">
                <span class="text-[16px] font-andada">{{ __('messages.discover_more') }}</span>
                <svg class="w-6 h-6 md:w-8 md:h-8 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</div>
