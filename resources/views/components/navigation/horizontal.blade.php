<div class="absolute top-[130px] left-16 z-20 hidden md:block">
    <nav class="flex items-center gap-[60px] text-light text-[22px] font-andada">
        <a href="/" class="hover:text-primary transition-colors duration-300 {{ $active === 'home' ? 'relative' : '' }}">
            @if($active === 'home')
            <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
            @endif
            {{ __('messages.home') }}
        </a>
        <a href="/our-style" class="hover:text-primary transition-colors duration-300 {{ $active === 'our-style' ? 'relative' : '' }}">
            @if($active === 'our-style')
            <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
            @endif
            {{ __('messages.our_style') }}
        </a>
        <a href="/about" class="hover:text-primary transition-colors duration-300 {{ $active === 'about' ? 'relative' : '' }}">
            @if($active === 'about')
            <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
            @endif
            {{ __('messages.about') }}
        </a>
        <a href="/contact" class="hover:text-primary transition-colors duration-300 {{ $active === 'contact' ? 'relative' : '' }}">
            @if($active === 'contact')
            <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
            @endif
            {{ __('messages.contact') }}
        </a>
    </nav>
</div>
