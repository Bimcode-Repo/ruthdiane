<div class="space-y-6">
    <form wire:submit="save" class="w-full space-y-6">
        <!-- Header -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
            <div class="md:col-span-2">
                <flux:heading size="xl">{{ $projectId ? 'Modifier le projet' : 'Créer un projet' }}</flux:heading>
                <flux:subheading>{{ $projectId ? 'Mettez à jour les informations' : 'Créez un nouveau projet' }}</flux:subheading>
            </div>
            <div class="flex justify-end">
                <flux:button href="{{ route('admin.projects') }}" wire:navigate variant="filled" icon="arrow-left">
                    Retour
                </flux:button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
            <!-- Main content - 2 cols -->
            <div class="md:col-span-2 space-y-6 w-full">

                <!-- Titres multilingues -->
                <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden" x-data="{ lang: 'fr' }">
                    <div class="px-6 py-4 border-b border-zinc-200 flex items-center justify-between ">
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

                <!-- Sections -->
                <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-zinc-200 flex items-center justify-between ">
                        <div>
                            <flux:heading size="lg">Sections</flux:heading>
                            <flux:subheading>4 images maximum par section</flux:subheading>
                        </div>
                        <flux:button type="button" wire:click="addSection" variant="primary" icon="plus" size="sm">
                            Ajouter
                        </flux:button>
                    </div>

                    <div class="p-6">
                        @if(empty($existingSections) && empty($sections))
                            <div class="text-center py-12 border-2 border-dashed border-zinc-300 rounded-lg">
                                <flux:icon.photo class="size-12 text-zinc-400 mx-auto mb-3" />
                                <flux:subheading>Aucune section</flux:subheading>
                            </div>
                        @else
                            <div class="space-y-4">
                                <!-- Existing sections -->
                                @foreach($existingSections as $idx => $section)
                                    <div class="border border-gray-300 rounded-lg overflow-hidden bg-gray-50" x-data="{ sLang: 'fr' }">
                                        <div class="px-4 py-3 bg-gray-100 border-b border-gray-300 flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <flux:badge color="gray" size="sm">{{ $idx + 1 }}</flux:badge>
                                                <div class="flex gap-1">
                                                    <button type="button" @click="sLang = 'fr'" :class="sLang === 'fr' ? 'bg-blue-600 text-white' : 'bg-white'" class="w-8 h-6 rounded text-xs">FR</button>
                                                    <button type="button" @click="sLang = 'en'" :class="sLang === 'en' ? 'bg-blue-600 text-white' : 'bg-white'" class="w-8 h-6 rounded text-xs">EN</button>
                                                    <button type="button" @click="sLang = 'es'" :class="sLang === 'es' ? 'bg-blue-600 text-white' : 'bg-white'" class="w-8 h-6 rounded text-xs">ES</button>
                                                    <button type="button" @click="sLang = 'it'" :class="sLang === 'it' ? 'bg-blue-600 text-white' : 'bg-white'" class="w-8 h-6 rounded text-xs">IT</button>
                                                </div>
                                            </div>
                                            <flux:button type="button" wire:click="removeExistingSection({{ $idx }})" wire:confirm="Supprimer ?" variant="danger" size="sm" icon="trash" />
                                        </div>

                                        <div class="p-4">
                                            <div class="space-y-3 mb-3">
                                                <div x-show="sLang === 'fr'" class="space-y-2">
                                                    <flux:input wire:model.live.debounce.500ms="existingSections.{{ $idx }}.title_fr" label="Titre (FR)" size="sm" />
                                                    <flux:textarea wire:model.live.debounce.500ms="existingSections.{{ $idx }}.description_fr" label="Description (FR)" rows="2" />
                                                </div>
                                                <div x-show="sLang === 'en'" class="space-y-2">
                                                    <flux:input wire:model.live.debounce.500ms="existingSections.{{ $idx }}.title_en" label="Title (EN)" size="sm" />
                                                    <flux:textarea wire:model.live.debounce.500ms="existingSections.{{ $idx }}.description_en" label="Description (EN)" rows="2" />
                                                </div>
                                                <div x-show="sLang === 'es'" class="space-y-2">
                                                    <flux:input wire:model.live.debounce.500ms="existingSections.{{ $idx }}.title_es" label="Título (ES)" size="sm" />
                                                    <flux:textarea wire:model.live.debounce.500ms="existingSections.{{ $idx }}.description_es" label="Descripción (ES)" rows="2" />
                                                </div>
                                                <div x-show="sLang === 'it'" class="space-y-2">
                                                    <flux:input wire:model.live.debounce.500ms="existingSections.{{ $idx }}.title_it" label="Titolo (IT)" size="sm" />
                                                    <flux:textarea wire:model.live.debounce.500ms="existingSections.{{ $idx }}.description_it" label="Descrizione (IT)" rows="2" />
                                                </div>
                                            </div>

                                            @if(!empty($section['existing_images']))
                                                <div class="mb-3">
                                                    <div class="grid grid-cols-4 gap-2">
                                                        @foreach($section['existing_images'] as $img)
                                                            <div class="relative group">
                                                                <img src="{{ asset($img['image']) }}" class="w-full h-20 object-cover rounded">
                                                                <button type="button" wire:click="removeExistingImage({{ $idx }}, {{ $img['id'] }})" class="absolute -top-1 -right-1 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100">
                                                                    <flux:icon.x-mark class="size-3" />
                                                                </button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            <div wire:key="upload-{{ $idx }}-{{ $uploadKey }}">
                                                <flux:label>Images de la section</flux:label>
                                                <flux:file-upload wire:model="existingSections.{{ $idx }}.new_images" accept="image/*" multiple>
                                                    <flux:file-upload.dropzone
                                                        heading="Drop files here or click to browse"
                                                        text="JPG, PNG, GIF up to 10MB"
                                                    />
                                                </flux:file-upload>
                                                <div class="mt-4 flex flex-col gap-2">
                                                    @if (!empty($section['new_images']))
                                                        @foreach($section['new_images'] as $idx2 => $img)
                                                            @if($img)
                                                                <flux:file-item
                                                                    heading="{{ $img->getClientOriginalName() }}"
                                                                    image="{{ $img->temporaryUrl() }}"
                                                                    size="{{ $img->getSize() }}"
                                                                >
                                                                    <x-slot name="actions">
                                                                        <flux:file-item.remove wire:click="$set('existingSections.{{ $idx }}.new_images.{{ $idx2 }}', null)" />
                                                                    </x-slot>
                                                                </flux:file-item>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- New sections -->
                                @foreach($sections as $idx => $section)
                                    <div class="border border-green-300 rounded-lg overflow-hidden bg-green-50" x-data="{ nLang: 'fr' }">
                                        <div class="px-4 py-3 bg-green-100 border-b border-green-300 flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <flux:badge color="green" size="sm">Nouveau {{ $idx + 1 }}</flux:badge>
                                                <div class="flex gap-1">
                                                    <button type="button" @click="nLang = 'fr'" :class="nLang === 'fr' ? 'bg-green-600 text-white' : 'bg-white'" class="w-8 h-6 rounded text-xs">FR</button>
                                                    <button type="button" @click="nLang = 'en'" :class="nLang === 'en' ? 'bg-green-600 text-white' : 'bg-white'" class="w-8 h-6 rounded text-xs">EN</button>
                                                    <button type="button" @click="nLang = 'es'" :class="nLang === 'es' ? 'bg-green-600 text-white' : 'bg-white'" class="w-8 h-6 rounded text-xs">ES</button>
                                                    <button type="button" @click="nLang = 'it'" :class="nLang === 'it' ? 'bg-green-600 text-white' : 'bg-white'" class="w-8 h-6 rounded text-xs">IT</button>
                                                </div>
                                            </div>
                                            <flux:button type="button" wire:click="removeSection({{ $idx }})" variant="danger" size="sm" icon="trash" />
                                        </div>

                                        <div class="p-4">
                                            <div class="space-y-3 mb-3">
                                                <div x-show="nLang === 'fr'" class="space-y-2">
                                                    <flux:input wire:model="sections.{{ $idx }}.title_fr" label="Titre (FR)" size="sm" />
                                                    <flux:textarea wire:model="sections.{{ $idx }}.description_fr" label="Description (FR)" rows="2" />
                                                </div>
                                                <div x-show="nLang === 'en'" class="space-y-2">
                                                    <flux:input wire:model="sections.{{ $idx }}.title_en" label="Title (EN)" size="sm" />
                                                    <flux:textarea wire:model="sections.{{ $idx }}.description_en" label="Description (EN)" rows="2" />
                                                </div>
                                                <div x-show="nLang === 'es'" class="space-y-2">
                                                    <flux:input wire:model="sections.{{ $idx }}.title_es" label="Título (ES)" size="sm" />
                                                    <flux:textarea wire:model="sections.{{ $idx }}.description_es" label="Descripción (ES)" rows="2" />
                                                </div>
                                                <div x-show="nLang === 'it'" class="space-y-2">
                                                    <flux:input wire:model="sections.{{ $idx }}.title_it" label="Titolo (IT)" size="sm" />
                                                    <flux:textarea wire:model="sections.{{ $idx }}.description_it" label="Descrizione (IT)" rows="2" />
                                                </div>
                                            </div>

                                            <div class="space-y-2">
                                                @for($i = 0; $i < 4; $i++)
                                                    <flux:file-upload wire:model="sections.{{ $idx }}.images.{{ $i }}" accept="image/*" label="Image {{ $i + 1 }}">
                                                        <flux:file-upload.dropzone
                                                            heading="Glissez ou cliquez pour parcourir"
                                                            text="JPG, PNG, WebP - Max 2MB"
                                                            with-progress
                                                            inline
                                                        />
                                                    </flux:file-upload>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Sidebar - 1 col -->
            <div class="space-y-6 w-full">

                <!-- Paramètres -->
                <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-zinc-200 ">
                        <flux:heading size="lg">Paramètres</flux:heading>
                    </div>

                    <div class="p-6 space-y-4">
                        <div>
                            <flux:input wire:model.live.debounce.500ms="slug" label="Slug" description="Auto-généré si vide" />
                        </div>

                        <div>
                            <flux:input wire:model.live.debounce.500ms="order" type="number" label="Ordre" required />
                            @error('order') <flux:error class="mt-1">{{ $message }}</flux:error> @enderror
                        </div>

                        <flux:separator />

                        <div>
                            <flux:checkbox wire:model.live="is_published" label="Publier le projet" />
                            <flux:description>Visible sur le site public</flux:description>
                        </div>
                    </div>
                </div>

                <!-- Image principale -->
                <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-zinc-200 ">
                        <flux:heading size="lg">Image principale</flux:heading>
                    </div>

                    <div class="p-6">
                        @if ($image && $projectId)
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
