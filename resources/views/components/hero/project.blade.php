@props(['project' => null])

<x-hero.page
    active="projects"
    :title="$project ? $project->title : __('messages.project_name')"
    :image="$project ? $project->image : 'medias/images/blog/blog-1.png'"
    :alt="$project ? $project->title : __('messages.project_name')"
/>