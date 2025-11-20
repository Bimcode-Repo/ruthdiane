<div class="space-y-6">
    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">Personnalisation des Traductions</h1>
            <p class="mt-1 text-sm text-gray-600">Modifiez les textes du site dans toutes les langues</p>
        </div>

        {{-- Locale Selector --}}
        <div class="flex gap-2">
            <button wire:click="$set('selectedLocale', 'fr')"
                class="px-4 py-2 rounded-lg {{ $selectedLocale === 'fr' ? 'bg-zinc-900 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                FR
            </button>
            <button wire:click="$set('selectedLocale', 'en')"
                class="px-4 py-2 rounded-lg {{ $selectedLocale === 'en' ? 'bg-zinc-900 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                EN
            </button>
            <button wire:click="$set('selectedLocale', 'es')"
                class="px-4 py-2 rounded-lg {{ $selectedLocale === 'es' ? 'bg-zinc-900 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                ES
            </button>
            <button wire:click="$set('selectedLocale', 'it')"
                class="px-4 py-2 rounded-lg {{ $selectedLocale === 'it' ? 'bg-zinc-900 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                IT
            </button>
        </div>
    </div>

    {{-- Search --}}
    <div class="max-w-md">
        <input
            type="text"
            wire:model.live.debounce.300ms="searchTerm"
            placeholder="Rechercher une clé ou un texte..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-zinc-900 focus:border-transparent"
        >
    </div>

    {{-- Categories Tabs --}}
    <div class="border-b border-gray-200">
        <div class="flex gap-1 overflow-x-auto">
            @foreach($categories as $categoryKey => $keys)
                <button
                    wire:click="$set('selectedCategory', '{{ $categoryKey }}')"
                    class="px-4 py-2 text-sm font-medium border-b-2 whitespace-nowrap {{ $selectedCategory === $categoryKey ? 'border-zinc-900 text-zinc-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                    {{ ucfirst(str_replace('_', ' ', $categoryKey)) }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- Translations Grid --}}
    <div class="bg-white border border-zinc-200 rounded-lg overflow-hidden" wire:key="translations-grid-{{ $selectedLocale }}-{{ $selectedCategory }}">
        @if(count($this->filteredTranslations) > 0)
            <div class="divide-y divide-zinc-200">
                @foreach($this->filteredTranslations as $key => $value)
                    <div class="p-4 hover:bg-zinc-50"
                         wire:key="translation-{{ $selectedLocale }}-{{ $key }}"
                         x-data="{
                            editing: false,
                            currentValue: '{{ addslashes($value) }}'
                         }"
                         @translation-updated.window="if ($event.detail.key === '{{ $key }}') currentValue = $event.detail.value">
                        <div class="flex items-start gap-4">
                            {{-- Key --}}
                            <div class="flex-shrink-0 w-1/4">
                                <div class="text-xs font-mono text-zinc-500 mb-1">{{ $key }}</div>
                            </div>

                            {{-- Value --}}
                            <div class="flex-1">
                                <div x-show="!editing" @click="editing = true" class="cursor-pointer group">
                                    <div class="text-sm text-zinc-900 group-hover:text-zinc-900">
                                        {{ $value ?: '(vide)' }}
                                    </div>
                                    <div class="text-xs text-zinc-400 mt-1 opacity-0 group-hover:opacity-100">
                                        Cliquer pour éditer
                                    </div>
                                </div>

                                <div x-show="editing" x-cloak>
                                    @if(strlen($value) > 100)
                                        <textarea
                                            x-model="currentValue"
                                            x-ref="input"
                                            x-init="editing && $nextTick(() => $refs.input.focus())"
                                            rows="3"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-zinc-900 focus:border-transparent text-sm"
                                            @keydown.escape="editing = false"
                                        ></textarea>
                                    @else
                                        <input
                                            type="text"
                                            x-model="currentValue"
                                            x-ref="input"
                                            x-init="editing && $nextTick(() => $refs.input.focus())"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-zinc-900 focus:border-transparent text-sm"
                                            @keydown.escape="editing = false"
                                            @keydown.enter="$wire.saveTranslation('{{ $key }}', currentValue).then(() => { editing = false })"
                                        >
                                    @endif

                                    <div class="flex gap-2 mt-2">
                                        <button
                                            @click="$wire.saveTranslation('{{ $key }}', currentValue).then(() => { editing = false })"
                                            class="px-3 py-1 bg-zinc-900 text-white text-xs rounded hover:bg-zinc-800">
                                            Enregistrer
                                        </button>
                                        <button
                                            @click="editing = false"
                                            class="px-3 py-1 bg-zinc-100 text-zinc-700 text-xs rounded hover:bg-zinc-200">
                                            Annuler
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="flex-shrink-0">
                                <flux:modal.trigger name="reset-{{ $selectedLocale }}-{{ $key }}">
                                    <flux:button
                                        variant="ghost"
                                        size="sm"
                                        class="text-red-600 hover:text-red-800"
                                        title="Réinitialiser à la valeur par défaut">
                                        Reset
                                    </flux:button>
                                </flux:modal.trigger>
                            </div>
                        </div>
                    </div>

                    {{-- Reset Confirmation Modal --}}
                    <flux:modal name="reset-{{ $selectedLocale }}-{{ $key }}" class="md:w-96">
                        <div class="space-y-6">
                            <div>
                                <flux:heading size="lg">Réinitialiser la traduction</flux:heading>
                                <flux:subheading class="mt-2">
                                    Êtes-vous sûr de vouloir réinitialiser cette traduction à sa valeur par défaut ?
                                </flux:subheading>
                                <div class="mt-4 p-3 bg-zinc-50 rounded-lg">
                                    <div class="text-xs font-mono text-zinc-500 mb-2">{{ $key }}</div>
                                    <div class="text-sm text-zinc-700">{{ $value }}</div>
                                </div>
                            </div>

                            <div class="flex gap-2 justify-end">
                                <flux:modal.close>
                                    <flux:button variant="ghost">Annuler</flux:button>
                                </flux:modal.close>
                                <flux:modal.close>
                                    <flux:button wire:click="resetTranslation('{{ $key }}')" variant="danger">
                                        Réinitialiser
                                    </flux:button>
                                </flux:modal.close>
                            </div>
                        </div>
                    </flux:modal>
                @endforeach
            </div>
        @else
            <div class="p-8 text-center text-zinc-500">
                @if(!empty($searchTerm))
                    Aucune traduction trouvée pour "{{ $searchTerm }}"
                @else
                    Aucune traduction dans cette catégorie
                @endif
            </div>
        @endif
    </div>
</div>
