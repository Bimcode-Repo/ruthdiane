<div>
    <x-hero.blog :blog="$blog"/>

    <div class="bg-background-darker items-center justify-center px-16 md:px-16 py-16">
        <div class="max-w-8xl mx-auto px-[20px] md:px-[40px] py-16">
            <div class="text-light text-2xl leading-relaxed font-joan py-16">
                {!! $blog->content !!}
            </div>
        </div>
    </div>

    <div class="bg-primary items-center justify-center px-8 py-16 md:px-16">
        <div class="max-w-8xl mx-auto px-[20px] md:px-[40px] py-8">
            <div class="flex flex-row justify-between">
                <div class="flex flex-row items-center justify-center">
                    <div class="mr-6">
                        <img src="https://placehold.co/40x40" class="rounded-full w-[40px] h-[40px]" />
                    </div>
                    <div class="text-[#3D3935] text-center text-2xl font-bold">
                        Ruth Diane
                    </div>
                </div>
                <div class="flex gap-4 md:gap-6">
                    <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                        <img
                            src="{{ asset('assets/icons/linkedin.svg') }}"
                            alt="LinkedIn"
                            class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]"
                        >
                    </a>
                    <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                        <img
                            src="{{ asset('assets/icons/instagram.svg') }}"
                            alt="Instagram"
                            class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]"
                        >
                    </a>
                    <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                        <img
                            src="{{ asset('assets/icons/facebook.svg') }}"
                            alt="Facebook"
                            class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]"
                        >
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-sections.blog-carousel/>
</div>
