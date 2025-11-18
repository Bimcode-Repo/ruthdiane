<div class="bg-background py-8 md:py-[60px]">
    <div class="max-w-8xl mx-auto px-[20px] md:px-[40px]">
        <x-sections.title
            :title="__('messages.about_title')"
            :description="__('messages.lorem_medium')"
        />

        <div class="w-full h-[400px] md:h-[550px] lg:h-[650px] overflow-hidden relative">
            <img src="{{ asset('medias/images/about/about-main.png') }}"
                 alt="À propos"
                 class="w-full h-full object-cover">

            <div class="absolute inset-0 flex items-center justify-center px-6 md:px-16">
                <p class="text-light text-[24px] text-center max-w-5xl leading-snug md:leading-relaxed font-joan" data-aos="zoomin">
                    {{ __('messages.curatorial_text') }}
                </p>
            </div>
        </div>
    </div>
</div>
