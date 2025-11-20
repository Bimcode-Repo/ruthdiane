<div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6" data-aos="fade-up">
        @include('components.h.title2', ['title' => $title])
        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
    </div>

    @if($description)
    <div>
        <p class="text-light text-lg leading-relaxed font-joan" data-aos="fade-up">
            {{ $description }}
        </p>
    </div>
    @endif
</div>
