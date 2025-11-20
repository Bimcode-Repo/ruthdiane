<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="xl">Messages de Contact</flux:heading>
            <flux:subheading>
                Gérez les demandes de vos clients
                @if($unreadCount > 0)
                    <flux:badge color="red" size="sm" class="ml-2">{{ $unreadCount }} non lu(s)</flux:badge>
                @endif
            </flux:subheading>
        </div>
    </div>

    @if (session()->has('success'))
        <div class="bg-white border border-zinc-200 rounded-lg p-6">
            <div class="flex items-center gap-2 text-green-700">
                <flux:icon.check-circle class="size-5" />
                <flux:text>{{ session('success') }}</flux:text>
            </div>
        </div>
    @endif

    <div class="flex gap-2">
        <flux:button
            wire:click="setFilter('all')"
            variant="{{ $filter === 'all' ? 'primary' : 'ghost' }}"
            size="sm"
        >
            Tous ({{ \App\Models\ContactMessage::count() }})
        </flux:button>
        <flux:button
            wire:click="setFilter('unread')"
            variant="{{ $filter === 'unread' ? 'primary' : 'ghost' }}"
            size="sm"
        >
            Non lus ({{ $unreadCount }})
        </flux:button>
        <flux:button
            wire:click="setFilter('read')"
            variant="{{ $filter === 'read' ? 'primary' : 'ghost' }}"
            size="sm"
        >
            Lus ({{ \App\Models\ContactMessage::read()->count() }})
        </flux:button>
    </div>

    <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-zinc-200">
            <thead class="bg-zinc-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-24">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-32">Téléphone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider w-32">Date</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-zinc-500 uppercase tracking-wider w-56">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-zinc-200">
                @forelse ($messages as $msg)
                    <tr class="{{ $msg->is_read ? 'hover:bg-zinc-50' : 'hover:bg-zinc-50' }} transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <flux:badge color="{{ $msg->is_read ? 'zinc' : 'green' }}" size="sm">
                                {{ $msg->is_read ? 'Lu' : 'Nouveau' }}
                            </flux:badge>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm {{ $msg->is_read ? 'font-normal' : 'font-semibold' }} text-zinc-900">
                                {{ $msg->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="mailto:{{ $msg->email }}" class="text-sm text-zinc-900 hover:text-zinc-700">
                                {{ $msg->email }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($msg->phone)
                                <a href="tel:{{ $msg->phone }}" class="text-zinc-900 hover:text-zinc-700">
                                    {{ $msg->phone }}
                                </a>
                            @else
                                <span class="text-zinc-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-500">
                            <div>{{ $msg->created_at->format('d/m/Y') }}</div>
                            <div class="text-xs text-zinc-400">{{ $msg->created_at->format('H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <flux:modal.trigger name="message-{{ $msg->id }}">
                                    <flux:button
                                        variant="filled"
                                        size="sm"
                                        icon="eye"
                                    >
                                        Voir
                                    </flux:button>
                                </flux:modal.trigger>
                                <flux:button
                                    wire:click="toggleRead({{ $msg->id }})"
                                    variant="filled"
                                    size="sm"
                                    icon-only
                                    icon="{{ $msg->is_read ? 'envelope-open' : 'envelope' }}"
                                >
                                </flux:button>
                                <flux:modal.trigger name="delete-message-{{ $msg->id }}">
                                    <flux:button
                                        variant="danger"
                                        size="sm"
                                        icon-only
                                        icon="trash"
                                    />
                                </flux:modal.trigger>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal pour afficher le message -->
                    <flux:modal name="message-{{ $msg->id }}" class="md:w-96">
                        <div class="space-y-6">
                            <div>
                                <flux:heading size="lg">Message de {{ $msg->name }}</flux:heading>
                                <flux:text class="mt-2">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2">
                                            <flux:icon.envelope class="size-4" />
                                            <a href="mailto:{{ $msg->email }}" class="hover:underline">{{ $msg->email }}</a>
                                        </div>
                                        @if($msg->phone)
                                            <div class="flex items-center gap-2">
                                                <flux:icon.phone class="size-4" />
                                                <a href="tel:{{ $msg->phone }}" class="hover:underline">{{ $msg->phone }}</a>
                                            </div>
                                        @endif
                                        <div class="flex items-center gap-2">
                                            <flux:icon.calendar class="size-4" />
                                            <span>{{ $msg->created_at->format('d/m/Y à H:i') }}</span>
                                        </div>
                                    </div>
                                </flux:text>
                            </div>

                            <div>
                                <flux:label>Message</flux:label>
                                <flux:text class="mt-2 whitespace-pre-wrap">{{ $msg->message }}</flux:text>
                            </div>

                            <div class="flex">
                                <flux:spacer />

                                <flux:button
                                    type="button"
                                    variant="primary"
                                    icon="envelope-open"
                                    wire:click="toggleRead({{ $msg->id }}); $flux.modal('message-{{ $msg->id }}').close()"
                                >
                                    {{ $msg->is_read ? 'Marquer non lu' : 'Marquer lu' }}
                                </flux:button>
                            </div>
                        </div>
                    </flux:modal>

                    {{-- Delete Confirmation Modal --}}
                    <flux:modal name="delete-message-{{ $msg->id }}" class="md:w-96" wire:key="modal-delete-message-{{ $msg->id }}">
                        <div class="space-y-6">
                            <div>
                                <flux:heading size="lg">Supprimer le message</flux:heading>
                                <flux:subheading class="mt-2">
                                    Êtes-vous sûr de vouloir supprimer ce message ?
                                </flux:subheading>
                                <div class="mt-4 p-3 bg-zinc-50 rounded-lg">
                                    <div class="text-sm font-medium text-zinc-900">De : {{ $msg->name }}</div>
                                    <div class="text-xs text-zinc-500 mt-1">{{ $msg->email }}</div>
                                </div>
                            </div>

                            <div class="flex gap-2 justify-end">
                                <flux:modal.close>
                                    <flux:button variant="ghost">Annuler</flux:button>
                                </flux:modal.close>
                                <flux:modal.close>
                                    <flux:button wire:click="deleteMessage({{ $msg->id }})" variant="danger">
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
                                <flux:icon.inbox class="size-12 text-zinc-400 mb-4" />
                                <flux:heading size="lg" class="mb-2">Aucun message</flux:heading>
                                <flux:subheading>
                                    @if($filter === 'unread')
                                        Vous n'avez aucun message non lu pour le moment.
                                    @elseif($filter === 'read')
                                        Vous n'avez aucun message lu pour le moment.
                                    @else
                                        Vous n'avez reçu aucun message pour le moment.
                                    @endif
                                </flux:subheading>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if($messages->hasPages())
            <div class="px-6 py-4 border-t border-zinc-200 bg-white">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</div>
