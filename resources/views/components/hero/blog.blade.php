@props(['blog' => null])
<x-hero.page
    active="blog"
    :title="$blog ? $blog->title : __('messages.blog_name')"
    :published_at="$blog ? $blog->published_at->format('d/m/Y') : null"
    :image="$blog ? $blog->image : 'medias/images-hd/salon-2.png'"
    :alt="$blog ? $blog->title : __('messages.blog_name')"
/>
