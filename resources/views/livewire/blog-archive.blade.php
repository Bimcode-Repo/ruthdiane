<div>
    <x-hero.page
        active="blog"
        title="{{ __('messages.blog') }}"
        image="medias/images/projects/project-7.jpg"
    />

    <div class="bg-background-darker py-16 md:py-24">
        <div class="max-w-8xl mx-auto px-[20px] md:px-[40px]">
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6 mb-12 md:mb-16" data-aos="fade-up">
                @include('components.h.title2', ['title' => __('messages.blog')])
                <div class="w-[40px] md:w-16 h-[1px] bg-white md:order-first"></div>
            </div>

            @if($blogs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8" data-aos="fade-up">
                    @foreach($blogs as $blog)
                        <a href="{{ route('blog.show', ['locale' => currentLocale(), 'slug' => $blog->slug]) }}"
                           class="relative group overflow-hidden h-[300px] md:h-[369px] flex-shrink-0 rounded-lg">
                            <img src="{{ asset($blog->image) }}"
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8 transition-all duration-300">
                                <h2 class="text-white text-[18px] md:text-[20px] mb-[10px] md:mb-[15px] font-andada-semibold">
                                    {{ $blog->title }}
                                </h2>
                                <p class="text-white text-[14px] md:text-[16px] leading-relaxed font-joan line-clamp-3 opacity-80">
                                    {{ $blog->excerpt }}
                                </p>
                                <div class="text-white text-[12px] md:text-[14px] mt-3 opacity-60 font-joan">
                                    {{ \Carbon\Carbon::parse($blog->published_at)->locale(app()->getLocale())->isoFormat('D MMMM YYYY') }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if($blogs->hasPages())
                    <div class="mt-12 md:mt-16" data-aos="fade-up">
                        {{ $blogs->links('components.pagination.custom') }}
                    </div>
                @endif
            @else
                <div class="text-center py-16 md:py-24" data-aos="fade-up">
                    <p class="text-light text-xl md:text-2xl font-joan">
                        {{ __('messages.no_blog_posts') }}
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>
