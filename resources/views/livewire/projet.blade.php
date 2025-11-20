<div>
    <x-hero.project :project="$project" />

    @foreach($project->sections as $section)
        @include('pages.partials.projet.project-section', ['section' => $section])
    @endforeach

    @if(blogEnabled())
        <x-sections.blog-carousel />
    @endif
</div>
