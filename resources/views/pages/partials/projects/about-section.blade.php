<div class="bg-background py-8 md:py-[60px]">
    <div class="max-w-8xl mx-auto px-[20px] md:px-[40px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16" data-aos="fade-up">
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                @include('components.h.title2', ['title' => __('messages.about')])
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <div>
                <p class="text-light text-lg leading-relaxed font-joan" data-aos="fade-up">
                    {{ __('messages.lorem_medium') }}
                </p>
            </div>
        </div>

        <div class="w-full h-[400px] md:h-[550px] lg:h-[650px] overflow-hidden relative" data-aos="zoom-in">
            <img src="{{ asset('medias/images/about/about-main.png') }}"
                 alt="À propos"
                 class="w-full h-full object-cover">

            <div class="absolute inset-0 flex items-center justify-center px-6 md:px-16">
                <p class="text-light text-[20px] text-center max-w-5xl leading-snug md:leading-relaxed font-joan">
                    {{ __('messages.curatorial_text') }}
                </p>
            </div>
        </div>
    </div>
</div>
