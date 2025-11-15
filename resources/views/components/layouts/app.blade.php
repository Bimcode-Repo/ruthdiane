<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Ruth Diane - Interior Design' }}</title>

    <!-- Google Fonts - Andada Pro & Joan Regular -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro:wght@400;500;600;700;800&family=Joan&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="max-w-8xl mx-auto">
        {{ $slot }}
    </div>

    <!-- Footer -->
    <footer class="bg-background py-12 md:py-16">
        <div class="max-w-8xl mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row justify-between items-center md:items-center gap-8 md:gap-12">
                <!-- Left Section: Logo + Titles -->
                <div class="flex items-center gap-4">
                    <img src="{{ asset('medias/images/logo/logo.svg') }}" alt="Ruth Safdie Interiors" class="w-[15px] h-[33px]">
                    <div class="text-left">
                        <h3 class="text-light text-[20px] font-semibold leading-none" style="font-family: 'Andada Pro', serif;">Ruth Safdie Interiors</h3>
                        <p class="text-light text-[10px] leading-none" style="font-family: 'Joan', serif;">Unlock The Art Of Refined Interiors</p>
                    </div>
                </div>

                <!-- Right Section: Social Icons + Mentions légales -->
                <div class="flex items-center gap-6">
                    <!-- Social Icons -->
                    <div class="flex items-center gap-3">
                        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                            <img src="{{ asset('assets/icons/linkedin.svg') }}" alt="LinkedIn" class="w-[21px] h-[21px]">
                        </a>
                        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                            <img src="{{ asset('assets/icons/instagram.svg') }}" alt="Instagram" class="w-[21px] h-[21px]">
                        </a>
                        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                            <img src="{{ asset('assets/icons/facebook.svg') }}" alt="Facebook" class="w-[21px] h-[21px]">
                        </a>
                    </div>

                    <!-- Mentions légales -->
                    <a href="#" class="text-light hover:text-primary transition-colors duration-300 text-[14px] underline" style="font-family: 'Andada Pro', serif; font-weight: 600;">
                        Mentions légales
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
