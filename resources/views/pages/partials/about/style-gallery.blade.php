<div class="bg-background">
    <div class="max-w-8xl mx-auto px-4 md:px-8 py-12 md:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6" data-aos="fade-right">
                @include('components.h.title2', ['title' => __('messages.lorem_title')])
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <div>
                <p class="text-light text-lg leading-relaxed font-joan" data-aos="fade-left">
                    {{ __('messages.lorem_medium') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
            <div class="relative overflow-hidden group" data-aos="fade-right">
                <img src="{{ asset('medias/images/styles/style-1.png') }}"
                     alt="Interior 1"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-andada-semibold">{{ __('messages.lorem_short') }}</p>
            </div>

            <div class="relative overflow-hidden group" data-aos="fade-left">
                <img src="{{ asset('medias/images/styles/style-2.png') }}"
                     alt="Interior 2"
                     class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                <img src="{{ asset('medias/images/blur/blurd.png') }}"
                     alt="Blur Effect"
                     class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                <p class="absolute bottom-6 md:bottom-8 left-6 md:left-8 text-light text-xl md:text-2xl font-andada-semibold">{{ __('messages.lorem_short') }}</p>
            </div>
        </div>
    </div>
</div>
