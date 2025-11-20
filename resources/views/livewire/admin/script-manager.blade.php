<div>
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <flux:heading size="xl">Scripts & Analyse</flux:heading>
                <flux:subheading>
                    Gérez les scripts de suivi et d'analyse conformes RGPD
                </flux:subheading>
            </div>
            <flux:modal.trigger name="script-form">
                <flux:button wire:click="create" icon="plus" variant="primary">
                    Ajouter un script
                </flux:button>
            </flux:modal.trigger>
        </div>

        <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-zinc-200">
                <thead class="bg-zinc-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-32">Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-zinc-500 uppercase tracking-wider w-24">Position</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-zinc-500 uppercase tracking-wider w-24">Statut</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-zinc-500 uppercase tracking-wider w-48">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-zinc-200">
                    @forelse($scripts as $script)
                        <tr wire:key="script-{{ $script->id }}" class="hover:bg-zinc-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-semibold text-zinc-900">{{ $script->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <flux:badge
                                    color="{{ $script->category === 'necessary' ? 'blue' : ($script->category === 'analytics' ? 'green' : 'purple') }}"
                                    size="sm"
                                >
                                    @if($script->category === 'necessary')
                                        Nécessaire
                                    @elseif($script->category === 'analytics')
                                        Analytique
                                    @else
                                        Marketing
                                    @endif
                                </flux:badge>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-zinc-600 max-w-md truncate">
                                    {{ $script->description ?: '-' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-zinc-900">{{ $script->position }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <flux:badge
                                    color="{{ $script->is_active ? 'green' : 'zinc' }}"
                                    size="sm"
                                >
                                    {{ $script->is_active ? 'Actif' : 'Inactif' }}
                                </flux:badge>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <flux:modal.trigger name="script-form">
                                        <flux:button
                                            wire:click="edit({{ $script->id }})"
                                            variant="filled"
                                            size="sm"
                                            icon="pencil"
                                        >
                                            Modifier
                                        </flux:button>
                                    </flux:modal.trigger>
                                    <flux:button
                                        wire:click="toggleActive({{ $script->id }})"
                                        variant="{{ $script->is_active ? 'ghost' : 'filled' }}"
                                        size="sm"
                                        icon="{{ $script->is_active ? 'eye-slash' : 'eye' }}"
                                        icon-only
                                    />
                                    <flux:modal.trigger name="delete-script-{{ $script->id }}">
                                        <flux:button
                                            variant="danger"
                                            size="sm"
                                            icon="trash"
                                            icon-only
                                        />
                                    </flux:modal.trigger>
                                </div>
                            </td>
                        </tr>

                        {{-- Delete Confirmation Modal --}}
                        <flux:modal name="delete-script-{{ $script->id }}" class="md:w-96" wire:key="modal-delete-script-{{ $script->id }}">
                            <div class="space-y-6">
                                <div>
                                    <flux:heading size="lg">Supprimer le script</flux:heading>
                                    <flux:subheading class="mt-2">
                                        Êtes-vous sûr de vouloir supprimer ce script ?
                                    </flux:subheading>
                                    <div class="mt-4 p-3 bg-zinc-50 rounded-lg">
                                        <div class="text-sm font-medium text-zinc-900">{{ $script->name }}</div>
                                    </div>
                                </div>

                                <div class="flex gap-2 justify-end">
                                    <flux:modal.close>
                                        <flux:button variant="ghost">Annuler</flux:button>
                                    </flux:modal.close>
                                    <flux:modal.close>
                                        <flux:button wire:click="delete({{ $script->id }})" variant="danger">
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
                                    <flux:icon.code-bracket class="size-12 text-zinc-400 mb-4" />
                                    <flux:heading size="lg" class="mb-2">Aucun script</flux:heading>
                                    <flux:subheading>
                                        Ajoutez votre premier script d'analyse ou de suivi.
                                    </flux:subheading>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <livewire:admin.script-form :scriptId="$editingScriptId" wire:key="script-form-{{ $editingScriptId ?? 'new' }}" />
</div>
