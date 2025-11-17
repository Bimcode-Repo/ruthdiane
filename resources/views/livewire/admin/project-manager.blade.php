<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gestion des Projets
            </h2>
            <a href="{{ route('admin.projects.create') }}" wire:navigate>
                <x-primary-button>
                    Créer un projet
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ordre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre (FR)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($projects as $project)
                            <tr>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $project->order }}</td>
                                <td class="px-6 py-4">
                                    @if($project->image)
                                        <img src="{{ asset($project->image) }}" alt="{{ $project->title_fr }}" class="h-12 w-20 object-cover rounded">
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $project->title_fr }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $project->slug }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs rounded {{ $project->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $project->is_published ? 'Publié' : 'Brouillon' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right text-sm space-x-2">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">
                                        Éditer
                                    </a>
                                    <button wire:click="deleteProject({{ $project->id }})" onclick="return confirm('Êtes-vous sûr ?')" class="text-red-600 hover:text-red-900">
                                        Supprimer
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    Aucun projet trouvé. Créez-en un !
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
    </div>
</div>
