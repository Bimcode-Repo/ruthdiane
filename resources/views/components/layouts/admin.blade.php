<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="{{ asset('medias/images/logo/favicon.ico') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
    </head>
    <body class="h-screen overflow-hidden bg-white">
        <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <flux:brand href="{{ route('admin.dashboard') }}" logo="{{ asset('medias/images/logo/logo.svg') }}" name="Ruth Safdie" class="px-2 dark:hidden" />
            <flux:brand href="{{ route('admin.dashboard') }}" logo="{{ asset('medias/images/logo/logo.svg') }}" name="Ruth Safdie" class="px-2 hidden dark:flex" />

            <flux:navlist variant="outline">
                <flux:navlist.item
                    icon="home"
                    href="{{ route('admin.dashboard') }}"
                    wire:navigate
                    wire:current="text-zinc-800 bg-white dark:bg-white/[7%] border-zinc-200">
                    Dashboard
                </flux:navlist.item>

                <flux:navlist.item
                    icon="photo"
                    href="{{ route('admin.projects') }}"
                    wire:navigate
                    wire:current="text-zinc-800 bg-white dark:bg-white/[7%] border-zinc-200">
                    Projets
                </flux:navlist.item>

                <flux:navlist.item
                    icon="document-text"
                    href="{{ route('admin.blogs') }}"
                    wire:navigate
                    wire:current="text-zinc-800 bg-white dark:bg-white/[7%] border-zinc-200">
                    Blogs
                </flux:navlist.item>

                <flux:navlist.item
                    icon="inbox"
                    href="{{ route('admin.contact') }}"
                    wire:navigate
                    wire:current="text-zinc-800 bg-white dark:bg-white/[7%] border-zinc-200"
                    badge="{{ \App\Models\ContactMessage::unread()->count() ?: null }}">
                    Messages
                </flux:navlist.item>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                <flux:navlist.item icon="arrow-right-start-on-rectangle" href="{{ route('home') }}">Retour au site</flux:navlist.item>
                <flux:navlist.item icon="arrow-right-end-on-rectangle" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</flux:navlist.item>
            </flux:navlist>
        </flux:sidebar>

        <form id="logout-form" action="/logout" method="POST" class="hidden">
            @csrf
        </form>

        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:profile avatar="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}" name="{{ auth()->user()->name }}" />
        </flux:header>

        <flux:main class="h-screen overflow-y-auto" id="main-content">
            <div class="p-6 transition-fade" id="page-content">
                {{ $slot }}
            </div>
        </flux:main>

        @persist('toast')
            <flux:toast />
        @endpersist

        <style>
            .transition-fade {
                transition: opacity 0.25s ease-in-out, transform 0.25s ease-in-out;
                opacity: 1;
                transform: translateY(0);
            }

            html.is-navigating .transition-fade {
                opacity: 0;
                transform: translateY(-15px);
            }
        </style>

        <script>
            // Debug pour voir si les événements se déclenchent
            document.addEventListener('livewire:navigate', (event) => {
                console.log('livewire:navigate', event);
                document.documentElement.classList.add('is-navigating');
            });

            document.addEventListener('livewire:navigating', (event) => {
                console.log('livewire:navigating', event);
                document.documentElement.classList.add('is-navigating');
            });

            document.addEventListener('livewire:navigated', (event) => {
                console.log('livewire:navigated', event);
                document.documentElement.classList.remove('is-navigating');
                document.getElementById('main-content').scrollTop = 0;
            });

            // Au cas où Livewire 3 utilise des événements différents
            window.addEventListener('livewire:init', () => {
                Livewire.hook('navigate', ({ url }) => {
                    console.log('Livewire hook navigate:', url);
                    document.documentElement.classList.add('is-navigating');
                });
            });
        </script>

        @fluxScripts
    </body>
</html>
