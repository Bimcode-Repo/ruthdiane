<x-layouts.app>
    <x-hero.our-style />

    @if(!inspirationMode())
        <x-sections.project-gallery />
    @endif

    <x-sections.partner-banner />

    <x-sections.about />

    @if(blogEnabled())
        <x-sections.blog-carousel />
    @endif
</x-layouts.app>
