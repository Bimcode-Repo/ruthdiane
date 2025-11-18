<div class="absolute top-0 left-0 right-0 h-[80px] md:h-[115px] border-b border-light z-20 flex items-center justify-between px-4 md:px-16">
    <a href="{{ route('home') }}" class="flex items-center gap-2 md:gap-4 hover:opacity-80 transition-opacity">
        <img src="{{ asset('medias/images/logo/logo.svg') }}" alt="Ruth Safdie Interiors" class="w-[12px] h-[26px] md:w-[15px] md:h-[33px]" data-aos="zoom-in">
        <div class="text-left">
            <h3 class="text-light text-[14px] md:text-[20px] font-semibold leading-none font-andada" data-aos="fade-in">Ruth Safdie Interiors</h3>
            <p class="text-light text-[8px] md:text-[10px] leading-none font-joan" data-aos="fade-in">Unlock The Art Of Refined Interiors</p>
        </div>
    </a>

    @livewire('language-switcher')
</div>
