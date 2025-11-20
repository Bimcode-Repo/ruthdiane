<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Membres</flux:heading>
            <flux:subheading>Gérez les utilisateurs administrateurs</flux:subheading>
        </div>
        <flux:modal.trigger name="user-form">
            <flux:button wire:click="create" icon="plus" variant="primary">
                Ajouter un membre
            </flux:button>
        </flux:modal.trigger>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-32">Date</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-zinc-500 uppercase tracking-wider w-48">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-zinc-200">
                @forelse($users as $user)
                    <tr wire:key="user-{{ $user->id }}" class="hover:bg-zinc-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-zinc-900">{{ $user->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="mailto:{{ $user->email }}" class="text-sm text-zinc-900 hover:text-zinc-700">
                                {{ $user->email }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500">
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <flux:modal.trigger name="user-form">
                                    <flux:button
                                        wire:click="edit({{ $user->id }})"
                                        variant="filled"
                                        size="sm"
                                        icon="pencil"
                                    >
                                        Modifier
                                    </flux:button>
                                </flux:modal.trigger>

                                @if($user->id !== auth()->id())
                                    <flux:modal.trigger name="delete-user-{{ $user->id }}">
                                        <flux:button
                                            variant="danger"
                                            size="sm"
                                            icon-only
                                            icon="trash"
                                        />
                                    </flux:modal.trigger>
                                @endif
                            </div>
                        </td>
                    </tr>

                    @if($user->id !== auth()->id())
                        {{-- Delete Confirmation Modal --}}
                        <flux:modal name="delete-user-{{ $user->id }}" class="md:w-96" wire:key="modal-delete-user-{{ $user->id }}">
                            <div class="space-y-6">
                                <div>
                                    <flux:heading size="lg">Supprimer l'utilisateur</flux:heading>
                                    <flux:subheading class="mt-2">
                                        Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                                    </flux:subheading>
                                    <div class="mt-4 p-3 bg-zinc-50 rounded-lg">
                                        <div class="text-sm font-medium text-zinc-900">{{ $user->name }}</div>
                                        <div class="text-xs text-zinc-500 mt-1">{{ $user->email }}</div>
                                    </div>
                                </div>

                                <div class="flex gap-2 justify-end">
                                    <flux:modal.close>
                                        <flux:button variant="ghost">Annuler</flux:button>
                                    </flux:modal.close>
                                    <flux:modal.close>
                                        <flux:button wire:click="delete({{ $user->id }})" variant="danger">
                                            Supprimer
                                        </flux:button>
                                    </flux:modal.close>
                                </div>
                            </div>
                        </flux:modal>
                    @endif
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12">
                            <div class="flex flex-col items-center justify-center">
                                <flux:icon.user-group class="size-12 text-zinc-400 mb-4" />
                                <flux:heading size="lg" class="mb-2">Aucun utilisateur</flux:heading>
                                <flux:subheading class="mb-4">Commencez par créer votre premier membre</flux:subheading>
                                <flux:modal.trigger name="user-form">
                                    <flux:button wire:click="create" icon="plus" variant="primary">
                                        Ajouter un membre
                                    </flux:button>
                                </flux:modal.trigger>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($users->hasPages())
            <div class="px-6 py-4 border-t border-zinc-200 bg-white">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    <livewire:admin.user-form :userId="$editingUserId" wire:key="user-form-{{ $editingUserId ?? 'new' }}" />
</div>
