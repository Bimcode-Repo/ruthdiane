<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Projets</flux:heading>
            <flux:subheading>Gérez vos projets d'architecture d'intérieur</flux:subheading>
        </div>
        <flux:button href="{{ route('admin.projects.create') }}" wire:navigate icon="plus" variant="primary">
            Nouveau projet
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-20">Ordre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-28">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-28">Sections</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-zinc-500 uppercase tracking-wider w-48">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-zinc-200">
                @forelse($projects as $project)
                    <tr wire:key="project-{{ $project->id }}" class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($project->image)
                                <img src="{{ asset($project->image) }}" alt="{{ $project->title_fr }}"
                                     class="h-12 w-20 object-cover rounded border border-zinc-200">
                            @else
                                <div class="h-12 w-20 bg-zinc-100 rounded border border-zinc-200 flex items-center justify-center">
                                    <flux:icon.photo class="size-6 text-zinc-400" />
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-zinc-900">{{ $project->title_fr }}</div>
                            @if($project->title_en && $project->title_en !== $project->title_fr)
                                <div class="text-sm text-zinc-500">{{ $project->title_en }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <flux:badge color="zinc" size="sm">{{ $project->order }}</flux:badge>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <flux:badge color="{{ $project->is_published ? 'green' : 'zinc' }}" size="sm">
                                {{ $project->is_published ? 'Publié' : 'Brouillon' }}
                            </flux:badge>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500">
                            {{ $project->sections->count() }} section(s)
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <flux:button
                                    href="{{ route('admin.projects.edit', $project->id) }}"
                                    wire:navigate
                                    variant="filled"
                                    size="sm"
                                    icon="pencil"
                                >
                                    Modifier
                                </flux:button>
                                <flux:modal.trigger name="delete-project-{{ $project->id }}">
                                    <flux:button
                                        variant="danger"
                                        size="sm"
                                        icon="trash"
                                        square
                                    />
                                </flux:modal.trigger>
                            </div>
                        </td>
                    </tr>

                    {{-- Delete Confirmation Modal --}}
                    <flux:modal name="delete-project-{{ $project->id }}" class="md:w-96" wire:key="modal-delete-project-{{ $project->id }}">
                        <div class="space-y-6">
                            <div>
                                <flux:heading size="lg">Supprimer le projet</flux:heading>
                                <flux:subheading class="mt-2">
                                    Êtes-vous sûr de vouloir supprimer ce projet ? Toutes les sections et images associées seront également supprimées.
                                </flux:subheading>
                                <div class="mt-4 p-3 bg-zinc-50 rounded-lg">
                                    <div class="text-sm font-medium text-zinc-900">{{ $project->name_fr }}</div>
                                </div>
                            </div>

                            <div class="flex gap-2 justify-end">
                                <flux:modal.close>
                                    <flux:button variant="ghost">Annuler</flux:button>
                                </flux:modal.close>
                                <flux:modal.close>
                                    <flux:button wire:click="deleteProject({{ $project->id }})" variant="danger">
                                        Supprimer
                                    </flux:button>
                                </flux:modal.close>
                            </div>
                        </div>
                    </flux:modal>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12">
                            <div class="flex flex-col items-center justify-center">
                                <flux:icon.photo class="size-12 text-zinc-400 mb-4" />
                                <flux:heading size="lg" class="mb-2">Aucun projet</flux:heading>
                                <flux:subheading class="mb-4">Commencez par créer votre premier projet</flux:subheading>
                                <flux:button href="{{ route('admin.projects.create') }}" wire:navigate icon="plus" variant="primary">
                                    Créer un projet
                                </flux:button>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($projects->hasPages())
            <div class="px-6 py-4 border-t border-zinc-200 bg-white">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>
