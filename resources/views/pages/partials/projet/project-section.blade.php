@props(['section'])

<div class="bg-background">
    <div class="max-w-8xl mx-auto px-4 md:px-8 py-12 md:py-16">
        @if($section->title)
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
                <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                    @include('components.h.title2', ['title' => $section->title])
                    <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
                </div>

                <div>
                    <p class="text-light text-lg leading-relaxed font-joan">
                        {{ $section->description }}
                    </p>
                </div>
            </div>
        @endif

        @if($section->images->count() >= 4)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-4 md:mb-6">
                @foreach($section->images->take(2) as $image)
                    <div class="relative overflow-hidden group">
                        <img src="{{ asset($image->image) }}"
                             alt="{{ $section->title }}"
                             class="w-full h-[300px] md:h-[400px] object-cover transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('medias/images/blur/blurd.png') }}"
                             alt="Blur Effect"
                             class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-1 md:grid-cols-[560px_1fr] gap-4 md:gap-6">
                @foreach($section->images->skip(2)->take(2) as $image)
                    <div class="relative overflow-hidden group">
                        <img src="{{ asset($image->image) }}"
                             alt="{{ $section->title }}"
                             class="w-full h-[300px] md:h-[360px] object-cover transition-transform duration-700 group-hover:scale-110">
                        <img src="{{ asset('medias/images/blur/blurd.png') }}"
                             alt="Blur Effect"
                             class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
