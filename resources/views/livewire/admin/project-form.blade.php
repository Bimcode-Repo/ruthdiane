<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $projectId ? 'Modifier le projet' : 'Créer un projet' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form wire:submit="save" class="space-y-6">
                        <div x-data="{ activeTab: 'fr' }">
                            <div class="border-b border-gray-200">
                                <nav class="-mb-px flex space-x-8">
                                    <button type="button" @click="activeTab = 'fr'" :class="activeTab === 'fr' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                        Français
                                    </button>
                                    <button type="button" @click="activeTab = 'en'" :class="activeTab === 'en' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                        English
                                    </button>
                                    <button type="button" @click="activeTab = 'es'" :class="activeTab === 'es' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                        Español
                                    </button>
                                    <button type="button" @click="activeTab = 'it'" :class="activeTab === 'it' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                        Italiano
                                    </button>
                                </nav>
                            </div>

                            <div class="mt-6">
                                <div x-show="activeTab === 'fr'" class="space-y-4">
                                    <div>
                                        <x-input-label for="title_fr" value="Titre (FR) *" />
                                        <x-text-input wire:model="title_fr" id="title_fr" class="block mt-1 w-full" type="text" required />
                                        <x-input-error :messages="$errors->get('title_fr')" class="mt-2" />
                                    </div>
                                </div>

                                <div x-show="activeTab === 'en'" class="space-y-4">
                                    <div>
                                        <x-input-label for="title_en" value="Title (EN) *" />
                                        <x-text-input wire:model="title_en" id="title_en" class="block mt-1 w-full" type="text" required />
                                        <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                                    </div>
                                </div>

                                <div x-show="activeTab === 'es'" class="space-y-4">
                                    <div>
                                        <x-input-label for="title_es" value="Título (ES) *" />
                                        <x-text-input wire:model="title_es" id="title_es" class="block mt-1 w-full" type="text" required />
                                        <x-input-error :messages="$errors->get('title_es')" class="mt-2" />
                                    </div>
                                </div>

                                <div x-show="activeTab === 'it'" class="space-y-4">
                                    <div>
                                        <x-input-label for="title_it" value="Titolo (IT) *" />
                                        <x-text-input wire:model="title_it" id="title_it" class="block mt-1 w-full" type="text" required />
                                        <x-input-error :messages="$errors->get('title_it')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <x-input-label for="slug" value="Slug (optionnel, généré automatiquement)" />
                            <x-text-input wire:model="slug" id="slug" class="block mt-1 w-full" type="text" />
                        </div>

                        <div>
                            <x-input-label for="newImage" value="Image {{ $projectId ? '' : '*' }}" />
                            <input type="file" wire:model="newImage" id="newImage" class="block mt-1 w-full" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp,image/avif" {{ $projectId ? '' : 'required' }}>
                            <x-input-error :messages="$errors->get('newImage')" class="mt-2" />
                            @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" class="mt-2 h-32 w-48 object-cover rounded">
                            @elseif ($image && $projectId)
                                <img src="{{ asset($image) }}" class="mt-2 h-32 w-48 object-cover rounded">
                            @endif
                        </div>

                        <div>
                            <x-input-label for="order" value="Ordre d'affichage *" />
                            <x-text-input wire:model="order" id="order" class="block mt-1 w-full" type="number" min="0" required />
                            <x-input-error :messages="$errors->get('order')" class="mt-2" />
                            <p class="mt-1 text-sm text-gray-500">Les projets seront affichés dans l'ordre croissant (0, 1, 2, ...)</p>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" wire:model="is_published" id="is_published" class="rounded border-gray-300">
                            <x-input-label for="is_published" value="Publié" class="ml-2" />
                        </div>

                        <div class="border-t pt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="font-semibold text-lg">Sections (4 photos par section)</h3>
                                <button type="button" wire:click="addSection" wire:loading.attr="disabled" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 disabled:opacity-50">
                                    <span wire:loading.remove wire:target="addSection">+ Ajouter une section</span>
                                    <span wire:loading wire:target="addSection">Ajout en cours...</span>
                                </button>
                            </div>

                            @if(empty($existingSections) && empty($sections))
                                <p class="text-gray-500 text-sm mb-4">Aucune section. Cliquez sur "Ajouter une section" pour commencer.</p>
                            @endif

                            @foreach($existingSections as $index => $section)
                                <div class="border rounded-lg p-6 mb-6 bg-gray-50" x-data="{ sectionTab: 'fr' }">
                                    <div class="flex justify-between items-center mb-4">
                                        <h4 class="font-medium text-md">Section existante {{ $index + 1 }}</h4>
                                        <button type="button" wire:click="removeExistingSection({{ $index }})" class="text-red-600 hover:text-red-800">
                                            Supprimer
                                        </button>
                                    </div>

                                    <div class="border-b border-gray-200 mb-4">
                                        <nav class="-mb-px flex space-x-8">
                                            <button type="button" @click="sectionTab = 'fr'" :class="sectionTab === 'fr' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">FR</button>
                                            <button type="button" @click="sectionTab = 'en'" :class="sectionTab === 'en' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">EN</button>
                                            <button type="button" @click="sectionTab = 'es'" :class="sectionTab === 'es' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">ES</button>
                                            <button type="button" @click="sectionTab = 'it'" :class="sectionTab === 'it' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">IT</button>
                                        </nav>
                                    </div>

                                    <div class="space-y-4">
                                        <div x-show="sectionTab === 'fr'">
                                            <p><strong>Titre:</strong> {{ $section['title_fr'] }}</p>
                                            <p><strong>Description:</strong> {{ $section['description_fr'] }}</p>
                                        </div>
                                        <div x-show="sectionTab === 'en'">
                                            <p><strong>Title:</strong> {{ $section['title_en'] }}</p>
                                            <p><strong>Description:</strong> {{ $section['description_en'] }}</p>
                                        </div>
                                        <div x-show="sectionTab === 'es'">
                                            <p><strong>Título:</strong> {{ $section['title_es'] }}</p>
                                            <p><strong>Descripción:</strong> {{ $section['description_es'] }}</p>
                                        </div>
                                        <div x-show="sectionTab === 'it'">
                                            <p><strong>Titolo:</strong> {{ $section['title_it'] }}</p>
                                            <p><strong>Descrizione:</strong> {{ $section['description_it'] }}</p>
                                        </div>
                                    </div>

                                    @if(!empty($section['existing_images']))
                                        <div class="mt-4">
                                            <h5 class="font-medium mb-2">Images existantes</h5>
                                            <div class="grid grid-cols-4 gap-4">
                                                @foreach($section['existing_images'] as $image)
                                                    <div class="relative group">
                                                        <img src="{{ asset($image['image']) }}" class="h-24 w-full object-cover rounded">
                                                        <button type="button" wire:click="removeExistingImage({{ $index }}, {{ $image['id'] }})" class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mt-4">
                                        <h5 class="font-medium mb-2">Ajouter des images</h5>
                                        <div class="grid grid-cols-2 gap-4">
                                            @for($i = 0; $i < 4; $i++)
                                                <div>
                                                    <label class="block text-sm text-gray-700">Image {{ $i + 1 }}</label>
                                                    <input type="file" wire:model="existingSections.{{ $index }}.new_images.{{ $i }}" class="block mt-1 w-full text-sm">
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @foreach($sections as $index => $section)
                                <div class="border rounded-lg p-6 mb-6 bg-gray-50" x-data="{ sectionTab: 'fr' }">
                                    <div class="flex justify-between items-center mb-4">
                                        <h4 class="font-medium text-md">Nouvelle section {{ $index + 1 }}</h4>
                                        <button type="button" wire:click="removeSection({{ $index }})" class="text-red-600 hover:text-red-800">
                                            Supprimer
                                        </button>
                                    </div>

                                    <div class="border-b border-gray-200 mb-4">
                                        <nav class="-mb-px flex space-x-8">
                                            <button type="button" @click="sectionTab = 'fr'" :class="sectionTab === 'fr' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">FR</button>
                                            <button type="button" @click="sectionTab = 'en'" :class="sectionTab === 'en' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">EN</button>
                                            <button type="button" @click="sectionTab = 'es'" :class="sectionTab === 'es' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">ES</button>
                                            <button type="button" @click="sectionTab = 'it'" :class="sectionTab === 'it' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">IT</button>
                                        </nav>
                                    </div>

                                    <div x-show="sectionTab === 'fr'" class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Titre (FR)</label>
                                            <input type="text" wire:model="sections.{{ $index }}.title_fr" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Description (FR)</label>
                                            <textarea wire:model="sections.{{ $index }}.description_fr" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                                        </div>
                                    </div>

                                    <div x-show="sectionTab === 'en'" class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Title (EN)</label>
                                            <input type="text" wire:model="sections.{{ $index }}.title_en" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Description (EN)</label>
                                            <textarea wire:model="sections.{{ $index }}.description_en" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                                        </div>
                                    </div>

                                    <div x-show="sectionTab === 'es'" class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Título (ES)</label>
                                            <input type="text" wire:model="sections.{{ $index }}.title_es" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Descripción (ES)</label>
                                            <textarea wire:model="sections.{{ $index }}.description_es" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                                        </div>
                                    </div>

                                    <div x-show="sectionTab === 'it'" class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Titolo (IT)</label>
                                            <input type="text" wire:model="sections.{{ $index }}.title_it" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Descrizione (IT)</label>
                                            <textarea wire:model="sections.{{ $index }}.description_it" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h5 class="font-medium mb-2">Images (4)</h5>
                                        <div class="grid grid-cols-2 gap-4">
                                            @for($i = 0; $i < 4; $i++)
                                                <div>
                                                    <label class="block text-sm text-gray-700">Image {{ $i + 1 }}</label>
                                                    <input type="file" wire:model="sections.{{ $index }}.images.{{ $i }}" class="block mt-1 w-full text-sm" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp,image/avif">
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ $projectId ? 'Mettre à jour' : 'Créer' }}
                            </x-primary-button>
                            <a href="{{ route('admin.projects') }}" wire:navigate class="text-gray-600 hover:text-gray-900">
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
