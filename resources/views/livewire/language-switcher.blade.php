<nav class="flex gap-3 md:gap-6">
    @php
        $languages = [
            'FR' => 1000,
            'EN' => 1300,
            'ES' => 1600,
            'IT' => 1900,
        ];

        $currentPath = request()->path();
        $segments = explode('/', $currentPath);
    @endphp

    @foreach($languages as $lang => $delay)
        @if(!empty($availableLanguages[$lang]))
            @php
                $locale = strtolower($lang);

                // Remplacer le premier segment (la locale actuelle) par la nouvelle
                if (in_array($segments[0], ['fr', 'en', 'es', 'it'])) {
                    $segments[0] = $locale;
                } else {
                    array_unshift($segments, $locale);
                }

                $newUrl = '/' . implode('/', $segments);
            @endphp

            <a
                @if(!session('visited'))
                    data-aos="fade-down" data-aos-delay="{{ $delay }}"
                @endif
                href="{{ $newUrl }}"
                class="text-light text-[12px] md:text-[14px] font-semibold hover:text-primary transition-colors duration-300 {{ $currentLanguage === $lang ? 'underline underline-offset-4' : '' }}">
                {{ $lang }}
            </a>
        @endif
    @endforeach
</nav>
