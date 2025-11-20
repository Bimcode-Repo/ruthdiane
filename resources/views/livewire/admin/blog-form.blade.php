<div class="space-y-6">
    <form wire:submit="save" class="w-full space-y-6">
        <!-- Header -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
            <div class="md:col-span-2">
                <flux:heading size="xl">{{ $blogId ? 'Modifier l\'article' : 'Créer un article' }}</flux:heading>
                <flux:subheading>{{ $blogId ? 'Mettez à jour les informations' : 'Créez un nouvel article' }}</flux:subheading>
            </div>
            <div class="flex justify-end">
                <flux:button href="{{ route('admin.blogs') }}" wire:navigate variant="filled" icon="arrow-left">
                    Retour
                </flux:button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
            <!-- Main content - 2 cols -->
            <div class="md:col-span-2 space-y-6 w-full">

                <!-- Titres multilingues -->
                <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden" x-data="{ lang: 'fr' }">
                    <div class="px-6 py-4 border-b border-zinc-200 flex items-center justify-between">
                        <flux:heading size="lg">Titres</flux:heading>
                        <div class="flex gap-1">
                            <button type="button" @click="lang = 'fr'"
                                    :class="lang === 'fr' ? 'bg-blue-600 text-white' : 'bg-zinc-100 text-zinc-600'"
                                    class="w-10 h-8 rounded text-sm font-medium">🇫🇷</button>
                            <button type="button" @click="lang = 'en'"
                                    :class="lang === 'en' ? 'bg-blue-600 text-white' : 'bg-zinc-100 text-zinc-600'"
                                    class="w-10 h-8 rounded text-sm font-medium">🇬🇧</button>
                            <button type="button" @click="lang = 'es'"
                                    :class="lang === 'es' ? 'bg-blue-600 text-white' : 'bg-zinc-100 text-zinc-600'"
                                    class="w-10 h-8 rounded text-sm font-medium">🇪🇸</button>
                            <button type="button" @click="lang = 'it'"
                                    :class="lang === 'it' ? 'bg-blue-600 text-white' : 'bg-zinc-100 text-zinc-600'"
                                    class="w-10 h-8 rounded text-sm font-medium">🇮🇹</button>
                        </div>
                    </div>

                    <div class="p-6">
                        <div x-show="lang === 'fr'">
                            <flux:input wire:model.live.debounce.500ms="title_fr" label="Titre (Français)" required />
                            @error('title_fr') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>
                        <div x-show="lang === 'en'">
                            <flux:input wire:model.live.debounce.500ms="title_en" label="Title (English)" required />
                            @error('title_en') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>
                        <div x-show="lang === 'es'">
                            <flux:input wire:model.live.debounce.500ms="title_es" label="Título (Español)" required />
                            @error('title_es') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>
                        <div x-show="lang === 'it'">
                            <flux:input wire:model.live.debounce.500ms="title_it" label="Titolo (Italiano)" required />
                            @error('title_it') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>
                    </div>
                </div>

                <!-- Contenu multilingue -->
                <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden" x-data="{ contentLang: 'fr' }">
                    <div class="px-6 py-4 border-b border-zinc-200 flex items-center justify-between">
                        <flux:heading size="lg">Contenu</flux:heading>
                        <div class="flex gap-1">
                            <button type="button" @click="contentLang = 'fr'"
                                    :class="contentLang === 'fr' ? 'bg-blue-600 text-white' : 'bg-zinc-100 text-zinc-600'"
                                    class="w-10 h-8 rounded text-sm font-medium">🇫🇷</button>
                            <button type="button" @click="contentLang = 'en'"
                                    :class="contentLang === 'en' ? 'bg-blue-600 text-white' : 'bg-zinc-100 text-zinc-600'"
                                    class="w-10 h-8 rounded text-sm font-medium">🇬🇧</button>
                            <button type="button" @click="contentLang = 'es'"
                                    :class="contentLang === 'es' ? 'bg-blue-600 text-white' : 'bg-zinc-100 text-zinc-600'"
                                    class="w-10 h-8 rounded text-sm font-medium">🇪🇸</button>
                            <button type="button" @click="contentLang = 'it'"
                                    :class="contentLang === 'it' ? 'bg-blue-600 text-white' : 'bg-zinc-100 text-zinc-600'"
                                    class="w-10 h-8 rounded text-sm font-medium">🇮🇹</button>
                        </div>
                    </div>

                    <div class="p-6">
                        <div x-show="contentLang === 'fr'">
                            <flux:editor wire:model.live.debounce.500ms="content_fr" label="Contenu (Français)" />
                            @error('content_fr') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>
                        <div x-show="contentLang === 'en'">
                            <flux:editor wire:model.live.debounce.500ms="content_en" label="Content (English)" />
                            @error('content_en') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>
                        <div x-show="contentLang === 'es'">
                            <flux:editor wire:model.live.debounce.500ms="content_es" label="Contenido (Español)" />
                            @error('content_es') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>
                        <div x-show="contentLang === 'it'">
                            <flux:editor wire:model.live.debounce.500ms="content_it" label="Contenuto (Italiano)" />
                            @error('content_it') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar - 1 col -->
            <div class="space-y-6 w-full">

                <!-- Paramètres -->
                <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-zinc-200">
                        <flux:heading size="lg">Paramètres</flux:heading>
                    </div>

                    <div class="p-6 space-y-4">
                        <div>
                            <flux:input wire:model.live.debounce.500ms="slug" label="Slug" description="Auto-généré si vide" />
                        </div>

                        <flux:separator />

                        <div>
                            <flux:checkbox wire:model.live="is_published" label="Publier l'article" />
                            <flux:description>Visible sur le site public</flux:description>
                        </div>

                        @if($is_published)
                            <div>
                                <flux:date-picker wire:model.live.debounce.500ms="published_at" label="Date de publication" description="Laissez vide pour la date actuelle" />
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Image principale -->
                <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-zinc-200">
                        <flux:heading size="lg">Image de couverture</flux:heading>
                    </div>

                    <div class="p-6">
                        @if ($image && $blogId)
                            <div class="mb-4 flex flex-col gap-2">
                                <flux:file-item
                                    heading="{{ basename($image) }}"
                                    image="{{ asset($image) }}"
                                    size="{{ file_exists(public_path($image)) ? filesize(public_path($image)) : 0 }}"
                                >
                                    <x-slot name="actions">
                                        <flux:file-item.remove wire:click="removeMainImage" />
                                    </x-slot>
                                </flux:file-item>
                            </div>
                        @endif

                        <flux:file-upload wire:model="newImage">
                            <flux:file-upload.dropzone
                                heading="Drop files here or click to browse"
                                text="JPG, PNG, GIF up to 10MB"
                            />
                        </flux:file-upload>
                        <div class="mt-4 flex flex-col gap-2">
                            @if ($newImage)
                                <flux:file-item
                                    heading="{{ $newImage->getClientOriginalName() }}"
                                    image="{{ $newImage->temporaryUrl() }}"
                                    size="{{ $newImage->getSize() }}"
                                >
                                    <x-slot name="actions">
                                        <flux:file-item.remove wire:click="$set('newImage', null)" />
                                    </x-slot>
                                </flux:file-item>
                            @endif
                        </div>

                        @error('newImage') <flux:error class="mt-2">{{ $message }}</flux:error> @enderror
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
