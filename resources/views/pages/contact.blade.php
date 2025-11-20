<div>
    <x-hero.contact />

    @include('pages.partials.contact.intro-banner')

    @include('pages.partials.contact.contact-form-section')

    @include('pages.partials.contact.press-section')

    @if(blogEnabled())
        <x-sections.blog-carousel />
    @endif
</div>
