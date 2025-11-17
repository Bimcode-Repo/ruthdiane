<x-layouts.app>
    <x-hero.home />

    @include('pages.partials.home.intro-text')

    <x-sections.project-gallery />

    <x-sections.partner-banner />

    @include('pages.partials.home.services')

    <x-sections.female-owned />

    @include('pages.partials.home.about-section')

    <x-sections.blog-carousel />
</x-layouts.app>
