<div class="bg-background py-16">
    <div class="max-w-8xl mx-auto px-[20px] md:px-[40px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16" data-aos="fade-up">
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                @include('components.h.title2', ['title' => __('messages.lorem_title')])
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <div class="flex items-center justify-start lg:justify-end">
                <a href="#" class="flex items-center gap-3 text-[#C4A882] hover:opacity-80 transition-opacity group">
                    <span class="text-lg leading-none font-andada">Contactez-nous</span>
                    <svg class="w-5 h-5 md:w-6 md:h-6 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-0 mb-8 md:mb-12 bg-background-darker" data-aos="fade-up">
            <div class="overflow-hidden lg:w-[818px] flex-shrink-0">
                <img src="{{ asset('medias/images/services/service-1.png') }}"
                     alt="Service 1"
                     class="w-full h-[250px] md:h-[400px] object-cover">
            </div>

            <div class="flex flex-col justify-center py-[20px] px-[20px] md:py-[25px] md:px-[40px] md:h-[400px] flex-1">
                <h2 class="text-[28px] md:text-3xl text-white font-semibold mb-[30px] md:mb-[60px] font-andada">Lorem ipsum dolor</h2>
                <p class="text-white text-xl leading-relaxed mb-[30px] md:mb-[60px] font-joan">
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
