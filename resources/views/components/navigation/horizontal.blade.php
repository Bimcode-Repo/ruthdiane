@php
    $hasVisited = session()->has('visited');
@endphp

<div class="absolute top-[130px] left-16 z-20 hidden md:block">
    <nav class="flex items-center gap-[60px] text-light text-[22px] font-andada">
        <a
            @unless($hasVisited)
                data-aos="fade-up" data-aos-delay="300"
            @endunless
            href="{{ route('home') }}"
            class="hover:text-primary transition-colors duration-300 {{ $active === 'home' ? 'relative' : '' }}"
        >
            @if($active === 'home')
                <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
            @endif
            {{ __('messages.home') }}
        </a>
        <a
            @unless($hasVisited)
                data-aos="fade-up" data-aos-delay="600"
            @endunless
            href="{{ route('our-style') }}"
            class="hover:text-primary transition-colors duration-300 {{ $active === 'our-style' ? 'relative' : '' }} {{ $active === 'projects' ? 'relative' : '' }}"
        >
            @if($active === 'our-style' or $active === 'projects')
                <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
            @endif
            {{ __('messages.our_style') }}
        </a>
        <a
            @unless($hasVisited)
                data-aos="fade-up" data-aos-delay="900"
            @endunless
            href="{{ route('about') }}"
            class="hover:text-primary transition-colors duration-300 {{ $active === 'about' ? 'relative' : '' }}"
        >
            @if($active === 'about')
                <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
            @endif
            {{ __('messages.about') }}
        </a>
        <a
            @unless($hasVisited)
                data-aos="fade-up" data-aos-delay="1200"
            @endunless
            href="{{ route('contact') }}"
            class="hover:text-primary transition-colors duration-300 {{ $active === 'contact' ? 'relative' : '' }}"
        >
            @if($active === 'contact')
                <div class="absolute left-1/2 -translate-x-1/2 bottom-full mb-[2.5px] w-px h-[25px] bg-light"></div>
            @endif
            {{ __('messages.contact') }}
        </a>
    </nav>
</div>
