<x-layouts.app>
    <x-hero.about />

    @include('pages.partials.about.intro-banner')

    @include('pages.partials.about.style-gallery')

    <x-sections.partner-banner />

    @include('pages.partials.about.services-section')

    <x-sections.female-owned />

    <x-sections.about />

    @if(blogEnabled())
        <x-sections.blog-carousel />
    @endif
</x-layouts.app>
