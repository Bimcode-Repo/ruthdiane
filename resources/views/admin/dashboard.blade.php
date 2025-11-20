<x-layouts.admin>
    <div class="space-y-6">
        <div>
            <flux:heading size="xl">Dashboard</flux:heading>
            <flux:subheading>Bienvenue dans l'administration de Ruth Safdie Interiors</flux:subheading>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Projets Card -->
            <div class="bg-white border border-zinc-200 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <flux:heading size="lg">Projets</flux:heading>
                    <flux:icon.photo class="size-8 text-zinc-400" />
                </div>
                <div class="text-3xl font-bold text-zinc-900 mb-2">{{ \App\Models\Project::count() }}</div>
                <flux:text>Total des projets publiés</flux:text>
                <flux:button href="{{ route('admin.projects') }}" wire:navigate variant="filled" class="mt-4 w-full">Gérer les projets</flux:button>
            </div>

            <!-- Blogs Card -->
            <div class="bg-white border border-zinc-200 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <flux:heading size="lg">Articles</flux:heading>
                    <flux:icon.document-text class="size-8 text-zinc-400" />
                </div>
                <div class="text-3xl font-bold text-zinc-900 mb-2">{{ \App\Models\Blog::where('is_published', true)->count() }}</div>
                <flux:text>Articles publiés</flux:text>
                <flux:button href="{{ route('admin.blogs') }}" wire:navigate variant="filled" class="mt-4 w-full">Gérer les articles</flux:button>
            </div>

            <!-- Messages Card -->
            <div class="bg-white border border-zinc-200 rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <flux:heading size="lg">Messages</flux:heading>
                    <flux:icon.inbox class="size-8 text-zinc-400" />
                </div>
                <div class="text-3xl font-bold text-zinc-900 mb-2">{{ \App\Models\ContactMessage::where('is_read', false)->count() }}</div>
                <flux:text>Messages non lus</flux:text>
                <flux:button href="{{ route('admin.contact') }}" wire:navigate variant="filled" class="mt-4 w-full">Voir les messages</flux:button>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white border border-zinc-200 rounded-lg p-6">
            <flux:heading size="lg" class="mb-4">Activité récente</flux:heading>

            <div class="space-y-4">
                @php
                    $recentBlogs = \App\Models\Blog::latest()->take(3)->get();
                    $recentProjects = \App\Models\Project::latest()->take(3)->get();
                @endphp

                @if($recentBlogs->count() > 0)
                    <div>
                        <flux:subheading class="mb-2">Derniers articles</flux:subheading>
                        <div class="space-y-2">
                            @foreach($recentBlogs as $blog)
                                <div class="flex items-center justify-between py-2 border-b border-zinc-100">
                                    <div>
                                        <flux:text class="font-medium">{{ $blog->title_fr }}</flux:text>
                                        <flux:text class="text-sm text-zinc-500">{{ $blog->created_at->diffForHumans() }}</flux:text>
                                    </div>
                                    <flux:badge color="{{ $blog->is_published ? 'green' : 'zinc' }}">
                                        {{ $blog->is_published ? 'Publié' : 'Brouillon' }}
                                    </flux:badge>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($recentProjects->count() > 0)
                    <div>
                        <flux:subheading class="mb-2">Derniers projets</flux:subheading>
                        <div class="space-y-2">
                            @foreach($recentProjects as $project)
                                <div class="flex items-center justify-between py-2 border-b border-zinc-100">
                                    <div>
                                        <flux:text class="font-medium">{{ $project->title_fr }}</flux:text>
                                        <flux:text class="text-sm text-zinc-500">{{ $project->created_at->diffForHumans() }}</flux:text>
                                    </div>
                                    <flux:badge color="{{ $project->is_published ? 'green' : 'zinc' }}">
                                        {{ $project->is_published ? 'Publié' : 'Brouillon' }}
                                    </flux:badge>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.admin>
