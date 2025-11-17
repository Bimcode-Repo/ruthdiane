<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Messages de Contact
            @if($unreadCount > 0)
                <span class="ml-2 px-2 py-1 text-xs bg-red-500 text-white rounded-full">{{ $unreadCount }}</span>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <div class="mb-4 flex gap-2">
                <button wire:click="setFilter('all')" class="px-4 py-2 rounded {{ $filter === 'all' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Tous ({{ \App\Models\ContactMessage::count() }})
                </button>
                <button wire:click="setFilter('unread')" class="px-4 py-2 rounded {{ $filter === 'unread' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Non lus ({{ $unreadCount }})
                </button>
                <button wire:click="setFilter('read')" class="px-4 py-2 rounded {{ $filter === 'read' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Lus ({{ \App\Models\ContactMessage::read()->count() }})
                </button>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Téléphone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($messages as $msg)
                            <tr class="{{ $msg->is_read ? 'bg-white' : 'bg-blue-50' }}">
                                <td class="px-6 py-4">
                                    @if($msg->is_read)
                                        <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-800">Lu</span>
                                    @else
                                        <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-800 font-semibold">Nouveau</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 {{ $msg->is_read ? 'font-normal' : 'font-semibold' }}">{{ $msg->name }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="mailto:{{ $msg->email }}" class="text-indigo-600 hover:text-indigo-900">{{ $msg->email }}</a>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    @if($msg->phone)
                                        <a href="tel:{{ $msg->phone }}" class="text-indigo-600 hover:text-indigo-900">{{ $msg->phone }}</a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="max-w-xs truncate">{{ $msg->message }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div>{{ $msg->created_at->format('d/m/Y') }}</div>
                                    <div class="text-xs">{{ $msg->created_at->format('H:i') }}</div>
                                </td>
                                <td class="px-6 py-4 text-right text-sm space-x-2">
                                    <button wire:click="toggleRead({{ $msg->id }})" class="text-indigo-600 hover:text-indigo-900">
                                        {{ $msg->is_read ? 'Non lu' : 'Lu' }}
                                    </button>
                                    <button wire:click="deleteMessage({{ $msg->id }})" onclick="return confirm('Êtes-vous sûr ?')" class="text-red-600 hover:text-red-900">
                                        Supprimer
                                    </button>
                                </td>
                            </tr>
                            @if(!$loop->last)
                            <tr>
                                <td colspan="7" class="px-6 py-3 bg-gray-50">
                                    <div class="text-sm">
                                        <strong>Message complet :</strong>
                                        <p class="mt-1 text-gray-700">{{ $msg->message }}</p>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Aucun message
                                    @if($filter === 'unread')
                                        non lu
                                    @elseif($filter === 'read')
                                        lu
                                    @endif
                                    trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
</div>
