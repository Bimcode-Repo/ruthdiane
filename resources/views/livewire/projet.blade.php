<div>
    <x-hero.project :project="$project" />

    @foreach($project->sections as $section)
        @include('pages.partials.projet.project-section', ['section' => $section])
    @endforeach

    <x-sections.blog-carousel />
</div>
