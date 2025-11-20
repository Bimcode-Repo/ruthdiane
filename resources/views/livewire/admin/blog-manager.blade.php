<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Articles de Blog</flux:heading>
            <flux:subheading>Gérez vos articles et publications</flux:subheading>
        </div>
        <flux:button href="{{ route('admin.blogs.create') }}" icon="plus" variant="primary">
            Nouvel article
        </flux:button>
    </div>

    @if (session()->has('success'))
        <div class="bg-white border border-zinc-200 rounded-lg p-6">
            <div class="flex items-center gap-2 text-green-700">
                <flux:icon.check-circle class="size-5" />
                <flux:text>{{ session('success') }}</flux:text>
            </div>
        </div>
    @endif

    <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-zinc-200">
            <thead class="bg-zinc-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-24">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Titre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-32">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-28">Statut</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-zinc-500 uppercase tracking-wider w-48">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-zinc-200">
                @forelse($blogs as $blog)
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($blog->image)
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title_fr }}"
                                     class="h-12 w-20 object-cover rounded border border-zinc-200">
                            @else
                                <div class="h-12 w-20 bg-zinc-100 rounded border border-zinc-200 flex items-center justify-center">
                                    <flux:icon.document-text class="size-6 text-zinc-400" />
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-zinc-900">{{ $blog->title_fr }}</div>
                            @if($blog->title_en && $blog->title_en !== $blog->title_fr)
                                <div class="text-sm text-zinc-500">{{ $blog->title_en }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500">
                            {{ $blog->published_at ? $blog->published_at->format('d/m/Y') : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <flux:badge color="{{ $blog->is_published ? 'green' : 'zinc' }}" size="sm">
                                {{ $blog->is_published ? 'Publié' : 'Brouillon' }}
                            </flux:badge>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <flux:button
                                    href="{{ route('admin.blogs.edit', $blog->id) }}"
                                    variant="filled"
                                    size="sm"
                                    icon="pencil"
                                >
                                    Modifier
                                </flux:button>
                                <flux:button
                                    wire:click="deleteBlog({{ $blog->id }})"
                                    wire:confirm="Êtes-vous sûr de vouloir supprimer cet article ?"
                                    variant="danger"
                                    size="sm"
                                    icon-only
                                    icon="trash"
                                />
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12">
                            <div class="flex flex-col items-center justify-center">
                                <flux:icon.document-text class="size-12 text-zinc-400 mb-4" />
                                <flux:heading size="lg" class="mb-2">Aucun article</flux:heading>
                                <flux:subheading class="mb-4">Commencez par créer votre premier article</flux:subheading>
                                <flux:button href="{{ route('admin.blogs.create') }}" icon="plus" variant="primary">
                                    Créer un article
                                </flux:button>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($blogs->hasPages())
            <div class="px-6 py-4 border-t border-zinc-200 bg-white">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</div>
