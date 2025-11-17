<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $blogId ? 'Modifier le blog' : 'Créer un blog' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form wire:submit.prevent="save" class="space-y-6">
                        <div x-data="{ activeTab: 'fr' }" class="space-y-6">
                            <div class="border-b border-gray-200">
                                <nav class="flex space-x-4">
                                    <button type="button" @click="activeTab = 'fr'" :class="activeTab === 'fr' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">
                                        Français
                                    </button>
                                    <button type="button" @click="activeTab = 'en'" :class="activeTab === 'en' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">
                                        English
                                    </button>
                                    <button type="button" @click="activeTab = 'es'" :class="activeTab === 'es' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">
                                        Español
                                    </button>
                                    <button type="button" @click="activeTab = 'it'" :class="activeTab === 'it' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500'" class="py-2 px-1 border-b-2 font-medium text-sm">
                                        Italiano
                                    </button>
                                </nav>
                            </div>

                            <div x-show="activeTab === 'fr'" class="space-y-4">
                                <div>
                                    <x-input-label for="title_fr" value="Titre (FR)" />
                                    <x-text-input wire:model="title_fr" id="title_fr" class="block mt-1 w-full" type="text" required />
                                    <x-input-error :messages="$errors->get('title_fr')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="content_fr" value="Contenu (FR)" />
                                    <textarea wire:model="content_fr" id="content_fr" rows="6" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" required></textarea>
                                    <x-input-error :messages="$errors->get('content_fr')" class="mt-2" />
                                </div>
                            </div>

                            <div x-show="activeTab === 'en'" class="space-y-4">
                                <div>
                                    <x-input-label for="title_en" value="Title (EN)" />
                                    <x-text-input wire:model="title_en" id="title_en" class="block mt-1 w-full" type="text" required />
                                    <x-input-error :messages="$errors->get('title_en')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="content_en" value="Content (EN)" />
                                    <textarea wire:model="content_en" id="content_en" rows="6" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" required></textarea>
                                    <x-input-error :messages="$errors->get('content_en')" class="mt-2" />
                                </div>
                            </div>

                            <div x-show="activeTab === 'es'" class="space-y-4">
                                <div>
                                    <x-input-label for="title_es" value="Título (ES)" />
                                    <x-text-input wire:model="title_es" id="title_es" class="block mt-1 w-full" type="text" required />
                                    <x-input-error :messages="$errors->get('title_es')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="content_es" value="Contenido (ES)" />
                                    <textarea wire:model="content_es" id="content_es" rows="6" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" required></textarea>
                                    <x-input-error :messages="$errors->get('content_es')" class="mt-2" />
                                </div>
                            </div>

                            <div x-show="activeTab === 'it'" class="space-y-4">
                                <div>
                                    <x-input-label for="title_it" value="Titolo (IT)" />
                                    <x-text-input wire:model="title_it" id="title_it" class="block mt-1 w-full" type="text" required />
                                    <x-input-error :messages="$errors->get('title_it')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="content_it" value="Contenuto (IT)" />
                                    <textarea wire:model="content_it" id="content_it" rows="6" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" required></textarea>
                                    <x-input-error :messages="$errors->get('content_it')" class="mt-2" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <x-input-label for="slug" value="Slug (optionnel, généré automatiquement)" />
                            <x-text-input wire:model="slug" id="slug" class="block mt-1 w-full" type="text" />
                        </div>

                        <div>
                            <x-input-label for="newImage" value="Image {{ $blogId ? '' : '*' }}" />
                            <input type="file" wire:model="newImage" id="newImage" class="block mt-1 w-full" accept="image/jpeg,image/jpg,image/png,image/gif,image/webp,image/avif" {{ $blogId ? '' : 'required' }}>
                            <x-input-error :messages="$errors->get('newImage')" class="mt-2" />
                            @if ($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" class="mt-2 h-32 w-48 object-cover rounded">
                            @elseif ($image && $blogId)
                                <img src="{{ asset($image) }}" class="mt-2 h-32 w-48 object-cover rounded">
                            @endif
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" wire:model="is_published" id="is_published" class="rounded border-gray-300">
                            <label for="is_published" class="ml-2 text-sm text-gray-600">Publier immédiatement</label>
                        </div>

                        <div class="flex justify-end gap-3">
                            <x-secondary-button type="button" wire:click="$redirect('{{ route('admin.blogs') }}')">
                                Annuler
                            </x-secondary-button>
                            <x-primary-button type="submit">
                                {{ $blogId ? 'Mettre à jour' : 'Créer' }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
