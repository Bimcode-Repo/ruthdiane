@props(['active', 'title', 'image', 'alt' => null])

<div class="h-screen relative overflow-hidden">
    <div class="absolute inset-0">
        <img
            src="{{ asset($image) }}"
            alt="{{ $alt ?? $title }}"
            class="w-full h-full object-cover"
        >
    </div>

    <div class="absolute inset-0 pointer-events-none">
        <img
            src="{{ asset('medias/images/blur/blurd.png') }}"
            alt="Blur Effect"
            class="w-full h-full object-cover"
        >
    </div>

    <div class="absolute inset-0 bg-background/30"></div>

    <x-navigation.header />

    <x-navigation.mobile :active="$active" />

    <x-navigation.horizontal :active="$active" />

    <x-navigation.social />

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 px-4">
        <h1 class="text-light text-[40px] md:text-[60px] font-bold text-center font-andada">{{ $title }}</h1>
    </div>

    <div class="absolute bottom-6 md:bottom-12 left-1/2 -translate-x-1/2 z-20 flex flex-col items-center">
        <p class="text-light text-[16px] md:text-[20px] tracking-wider mb-[15px] md:mb-[20px]">{{ __('messages.scroll') }}</p>

        <div class="w-px h-[35px] md:h-[47px] bg-light"></div>
    </div>
</div>
