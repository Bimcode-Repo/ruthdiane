@php
    $hasVisited = session()->has('visited');
@endphp

<div class="absolute bottom-[20px] md:bottom-[40px] right-4 md:right-16 z-20">
    <div class="flex gap-4 md:gap-6">
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img
                @unless($hasVisited)
                    data-aos="fade-in"
                @endunless
                src="{{ asset('assets/icons/linkedin.svg') }}"
                alt="LinkedIn"
                class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]"
            >
        </a>
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img
                @unless($hasVisited)
                    data-aos="fade-in"
                @endunless
                src="{{ asset('assets/icons/instagram.svg') }}"
                alt="Instagram"
                class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]"
            >
        </a>
        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
            <img
                @unless($hasVisited)
                    data-aos="fade-in"
                @endunless
                src="{{ asset('assets/icons/facebook.svg') }}"
                alt="Facebook"
                class="w-[22px] h-[22px] md:w-[28px] md:h-[28px]"
            >
        </a>
    </div>
</div>
