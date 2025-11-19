<div>
    <x-hero.blog :blog="$blog"/>

    <div class="bg-primary items-center justify-center px-8 md:px-16 py-16">
        <div class="bg-primary flex items-center px-8 md:px-16">
            <p class="text-background text-xl text-white font-joan" data-aos="fade-up">
                {{-- Sous-titre, extrait ou citation accrocheuse --}}
                {{ $blog->excerpt }}
            </p>
        </div>

        <div class="bg-primary px-8 md:px-16">
            <span class="text-background mx-auto py-14 px-16">
                {{ __('Publié le') }} {{ optional($blog->published_at)->format('d/m/Y') }}
            </span>
            <div class="text-background text-lg md:text-xl leading-relaxed font-joan py-16">
                {!! $blog->content !!}
            </div>
        </div>
    </div>

    <x-sections.blog-carousel/>
</div>
