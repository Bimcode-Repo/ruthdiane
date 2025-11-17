<nav class="absolute left-4 md:left-16 top-1/2 -translate-y-1/2 z-20">
    <div class="mb-6 md:mb-8">
        <img
            src="{{ asset('medias/images/logo/logo.svg') }}"
            alt="Ruth Diane Logo"
            class="w-[28px] h-[60px] md:w-[35px] md:h-[75px]"
        >
    </div>

    <ul class="space-y-4 md:space-y-6">
        <li class="relative">
            <div class="absolute left-[-16.5px] md:left-[-40.5px] top-1/2 -translate-y-1/2 w-[15px] h-px bg-light"></div>
            <a href="/" class="text-light text-[24px] md:text-[40px] font-bold font-andada hover:text-primary transition-colors duration-300">
                {{ __('messages.home') }}
            </a>
        </li>
        <li>
            <a href="/our-style" class="text-light text-[24px] md:text-[40px] font-bold font-andada hover:text-primary transition-colors duration-300">
                {{ __('messages.our_style') }}
            </a>
        </li>
        <li>
            <a href="/about" class="text-light text-[24px] md:text-[40px] font-bold font-andada hover:text-primary transition-colors duration-300">
                {{ __('messages.about') }}
            </a>
        </li>
        <li>
            <a href="/contact" class="text-light text-[24px] md:text-[40px] font-bold font-andada hover:text-primary transition-colors duration-300">
                {{ __('messages.contact') }}
            </a>
        </li>
    </ul>
</nav>
