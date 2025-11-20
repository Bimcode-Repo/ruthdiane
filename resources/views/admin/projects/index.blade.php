<x-layouts.admin>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <flux:heading size="xl">Projets</flux:heading>
                <flux:subheading>Gérez vos projets d'architecture d'intérieur</flux:subheading>
            </div>
            <flux:button href="{{ route('admin.projects.create') }}" icon="plus">Nouveau projet</flux:button>
        </div>

        @if(session('success'))
            <flux:callout variant="success">{{ session('success') }}</flux:callout>
        @endif

        <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-zinc-50 border-b border-zinc-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Titre (FR)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Ordre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Sections</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-zinc-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-zinc-200">
                    @forelse($projects as $project)
                        <tr class="hover:bg-zinc-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($project->image)
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->title_fr }}" class="h-12 w-20 object-cover rounded">
                                @else
                                    <div class="h-12 w-20 bg-zinc-200 rounded flex items-center justify-center">
                                        <flux:icon.photo class="size-6 text-zinc-400" />
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-zinc-900">{{ $project->title_fr }}</div>
                                <div class="text-sm text-zinc-500">{{ $project->slug }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-zinc-900">{{ $project->order }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <flux:badge :color="$project->is_published ? 'green' : 'zinc'">
                                    {{ $project->is_published ? 'Publié' : 'Brouillon' }}
                                </flux:badge>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-zinc-900">{{ $project->sections->count() }} sections</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <flux:button href="{{ route('admin.projects.edit', $project) }}" size="sm" variant="ghost">Éditer</flux:button>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button type="submit" size="sm" variant="ghost" color="red">Supprimer</flux:button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <flux:icon.photo class="mx-auto size-12 text-zinc-400 mb-3" />
                                <flux:heading size="lg" class="mb-2">Aucun projet</flux:heading>
                                <flux:text class="mb-4">Commencez par créer votre premier projet</flux:text>
                                <flux:button href="{{ route('admin.projects.create') }}" icon="plus">Nouveau projet</flux:button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $projects->links() }}
        </div>
    </div>
</x-layouts.admin>
