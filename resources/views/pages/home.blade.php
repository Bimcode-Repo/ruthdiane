<x-layouts.app>
    <x-hero.home />

    @include('pages.partials.home.intro-text')

    @if(!inspirationMode())
        <x-sections.project-gallery />
    @else
        <x-sections.inspiration-gallery />
    @endif

    <x-sections.partner-banner />

    @include('pages.partials.home.services')

    <x-sections.female-owned />

    <x-sections.about />

    @if(blogEnabled())
        <x-sections.blog-carousel />
    @endif
</x-layouts.app>
