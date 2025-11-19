@props(['blog' => null])

<x-hero.page
    active="blog"
    :title="$blog ? $blog->title : __('messages.blog_name')"
    :image="$blog ? $blog->image : 'medias/images/blog/blog-1.png'"
    :alt="$blog ? $blog->title : __('messages.blog_name')"
/>
