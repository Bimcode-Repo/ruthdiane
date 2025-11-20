<div class="h-screen relative overflow-hidden">
    @livewire('hero-carousel')

    <div class="absolute inset-0 pointer-events-none">
        <img
            src="{{ asset('medias/images/blur/blurd.png') }}"
            alt="Blur Effect"
            class="w-full h-full object-cover"
        >
    </div>

    <div class="absolute inset-0 bg-background/30"></div>

    <div class="absolute left-2 md:left-8 top-0 h-full w-px bg-light pointer-events-none z-10"></div>

    <x-navigation.header />

    <x-navigation.mobile active="home" />

    <x-navigation />

    <x-navigation.social />
</div>
