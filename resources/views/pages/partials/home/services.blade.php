<div class="bg-background py-8 md:py-[60px]">
    <div class="max-w-8xl mx-auto px-[20px] md:px-[40px]">
        <div class="flex flex-col md:flex-row justify-between mb-8 md:mb-16 gap-6">
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                <h1 data-aos="fade-in" class="text-3xl text-white font-bold leading-none font-andada">{{ __('messages.our_services') }}</h1>
                <div class="w-[40px] md:w-[55px] h-[1px] bg-white md:order-first"></div>
            </div>

            <div class="flex items-end md:pb-2" data-aos="fade-in">
                <a href="{{ route('contact') }}" class="flex items-center gap-3 text-[#C4A882] hover:opacity-80 transition-opacity group">
                    <span class="text-lg leading-none font-andada">{{ __('messages.contact_us') }}</span>
                    <svg class="w-6 h-6 md:w-8 md:h-8 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-0 mb-8 md:mb-12 bg-background-darker">
            <div class="overflow-hidden lg:w-[818px] flex-shrink-0">
                <img src="{{ asset('medias/images/services/service-1.png') }}"
                     alt="Service 1"
                     class="w-full h-[250px] md:h-[400px] object-cover">
            </div>

            <div class="flex flex-col justify-center py-[20px] px-[20px] md:py-[25px] md:px-[40px] md:h-[400px] flex-1">
                <h2 class="text-[28px] md:text-3xl text-white font-semibold mb-[30px] md:mb-[60px] font-andada">{{ __('messages.lorem_short') }}</h2>
                <p class="text-white text-xl leading-relaxed mb-[30px] md:mb-[60px] font-joan">
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

        <div class="flex flex-col lg:flex-row gap-0 mb-8 md:mb-12 bg-background-darker">
            <div class="flex flex-col justify-center py-[20px] px-[20px] md:py-[25px] md:px-[40px] md:h-[400px] flex-1 order-2 lg:order-1">
                <h2 class="text-[28px] md:text-3xl text-white font-semibold mb-[30px] md:mb-[60px] font-andada">{{ __('messages.lorem_short') }}</h2>
                <p class="text-white text-xl leading-relaxed mb-[30px] md:mb-[60px] font-joan">
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

            <div class="overflow-hidden lg:w-[818px] flex-shrink-0 order-1 lg:order-2">
                <img src="{{ asset('medias/images/services/service-2.png') }}"
                     alt="Service 2"
                     class="w-full h-[250px] md:h-[400px] object-cover">
            </div>
        </div>

        <div class="mt-8 md:mt-12">
            <div class="bg-[#C4A882] py-8 md:py-16 px-6 md:px-8 flex flex-col lg:flex-row justify-between items-center gap-6 md:gap-8">
                <div>
                    <h2 class="text-2xl md:text-4xl text-[#3D3935] font-light mb-2 font-andada">{{ __('messages.lorem_banner_title') }}</h2>
                    <p class="text-[#3D3935] text-base md:text-lg">{{ __('messages.lorem_short') }}</p>
                </div>

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
