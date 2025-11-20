<nav class="absolute left-4 md:left-16 top-1/2 -translate-y-1/2 z-20">
    <div class="mb-6 md:mb-8">
        <img
            src="{{ asset('medias/images/logo/logo.svg') }}"
            alt="Ruth Diane Logo"
            class="w-[28px] h-[60px] md:w-[35px] md:h-[75px]"
            @if(!session('visited')) data-aos="fade-in" @endif
        >
    </div>

    <ul class="space-y-4 md:space-y-6">
        <li class="relative"
            @if(!session('visited')) data-aos="fade-left" data-aos-delay="1000" @endif
        >
            <div class="absolute left-[-16.5px] md:left-[-40.5px] top-1/2 -translate-y-1/2 w-[15px] h-px bg-light"></div>
            <a href="{{ route('home') }}" class="text-light text-[24px] font-bold font-andada hover:text-primary transition-colors duration-300">
                {{ __('messages.home') }}
            </a>
        </li>
        @if(!inspirationMode())
            <li @if(!session('visited')) data-aos="fade-left" data-aos-delay="1300" @endif>
                <a href="{{ route('projects') }}" class="text-light text-[24px] font-bold font-andada hover:text-primary transition-colors duration-300">
                    {{ __('messages.our_style') }}
                </a>
            </li>
        @endif
        <li @if(!session('visited')) data-aos="fade-left" data-aos-delay="1600" @endif>
            <a href="{{ route('about') }}" class="text-light text-[24px] font-bold font-andada hover:text-primary transition-colors duration-300">
                {{ __('messages.about') }}
            </a>
        </li>
        <li @if(!session('visited')) data-aos="fade-left" data-aos-delay="1900" @endif>
            <a href="{{ route('contact') }}" class="text-light text-[24px] font-bold font-andada hover:text-primary transition-colors duration-300">
                {{ __('messages.contact') }}
            </a>
        </li>
        @if(blogEnabled())
            <li @if(!session('visited')) data-aos="fade-left" data-aos-delay="2200" @endif>
                <a href="{{ route('blog.archive', ['locale' => currentLocale()]) }}" class="text-light text-[24px] font-bold font-andada hover:text-primary transition-colors duration-300">
                    {{ __('messages.blog') }}
                </a>
            </li>
        @endif
    </ul>
</nav>
