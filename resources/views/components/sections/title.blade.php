<div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
        <h2 class="text-[40px] md:text-[60px] text-light font-bold">{{ $title }}</h2>
        <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
    </div>

    @if($description)
    <div>
        <p class="text-light text-[18px] md:text-[25px] leading-relaxed font-joan">
            {{ $description }}
        </p>
    </div>
    @endif
</div>
