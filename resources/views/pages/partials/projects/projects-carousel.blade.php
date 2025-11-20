<div class="bg-background-darker py-12 md:py-16 lg:py-20">
    <div class="max-w-8xl mx-auto px-6 md:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-8 md:mb-16">
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                @include('components.h.title1', ['title' => __('messages.all_projects')])
                <div class="w-[40px] md:w-16 h-[1px] bg-white md:order-first"></div>
            </div>

            <div>
                <p class="text-light text-lg leading-relaxed font-joan">
                    {{ __('messages.lorem_long') }}
                </p>
            </div>
        </div>
    </div>

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
        <div x-ref="slider" @scroll="updateArrows()" class="flex gap-4 md:gap-6 overflow-x-hidden scroll-smooth relative">
            <a href="/projet/lorem" class="relative group overflow-hidden w-[280px] md:w-[530px] h-[195px] md:h-[369px] flex-shrink-0 block">
                <img src="{{ asset('medias/images/projects/project-6.jpg') }}"
                     alt="Blog 1"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 transition-opacity duration-300" :class="isCardPartial(0) ? 'opacity-50' : 'opacity-100'">
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px] font-andada-semibold">{{ __('messages.project_name') }}</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed font-joan">
                        {{ __('messages.blog_card_text') }}
                    </p>
                </div>
            </a>

            <a href="/projet/lorem" class="relative group overflow-hidden w-[280px] md:w-[530px] h-[195px] md:h-[369px] flex-shrink-0 block">
                <img src="{{ asset('medias/images/projects/project-7.jpg') }}"
                     alt="Blog 2"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 transition-opacity duration-300" :class="isCardPartial(1) ? 'opacity-50' : 'opacity-100'">
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px] font-andada-semibold">{{ __('messages.project_name') }}</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed font-joan">
                        {{ __('messages.blog_card_text') }}
                    </p>
                </div>
            </a>

            <a href="/projet/lorem" class="relative group overflow-hidden w-[280px] md:w-[530px] h-[195px] md:h-[369px] flex-shrink-0 block">
                <img src="{{ asset('medias/images/projects/project-8.jpg') }}"
                     alt="Blog 3"
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-4 md:p-8 transition-opacity duration-300" :class="isCardPartial(2) ? 'opacity-50' : 'opacity-100'">
                    <h2 class="text-white text-[16px] md:text-[20px] mb-[10px] md:mb-[15px] font-andada-semibold">{{ __('messages.project_name') }}</h2>
                    <p class="text-white text-[14px] md:text-[18px] leading-relaxed font-joan">
                        {{ __('messages.blog_card_text') }}
                    </p>
                </div>
            </a>
        </div>

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
