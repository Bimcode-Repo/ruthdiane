<div x-data x-on:consent-saved.window="window.location.reload()">
    <x-hero.page
        active="cookies"
        title="{{ __('messages.cookie_preferences') }}"
        image="medias/images-hd/background-2.png"
    />

    <div class="bg-background-darker py-16 md:py-24">
        <div class="max-w-4xl mx-auto px-6 md:px-12">
            @if(session('success'))
                <div class="mb-8 bg-primary/20 border border-primary text-light px-6 py-4 rounded-lg" data-aos="fade-up">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-joan">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="space-y-8">
                {{-- Introduction --}}
                <div class="text-light" data-aos="fade-up">
                    <h2 class="text-2xl md:text-3xl font-andada font-semibold mb-4">
                        {{ __('messages.cookie_page_title') }}
                    </h2>
                    <p class="font-joan text-lg leading-relaxed opacity-90">
                        {{ __('messages.cookie_page_description') }}
                    </p>
                </div>

                {{-- Catégories de cookies --}}
                <div class="space-y-6" data-aos="fade-up">
                    {{-- Cookies nécessaires --}}
                    <div class="bg-[#2D2A27] p-6 md:p-8 rounded-lg border border-zinc-700">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-andada font-semibold text-light mb-2">
                                    {{ __('messages.cookie_necessary') }}
                                </h3>
                                <p class="font-joan text-light opacity-80">
                                    {{ __('messages.cookie_necessary_desc') }}
                                </p>
                            </div>
                            <div class="ml-4">
                                <input type="checkbox" wire:model="necessary" disabled checked class="w-6 h-6 accent-primary cursor-not-allowed opacity-50">
                            </div>
                        </div>
                        @if($scripts['necessary']->count() > 0)
                            <div class="mt-4 pt-4 border-t border-zinc-700">
                                <p class="text-sm font-joan text-light opacity-70 mb-2">Scripts utilisés :</p>
                                <ul class="space-y-1">
                                    @foreach($scripts['necessary'] as $script)
                                        <li class="text-sm font-joan text-light opacity-80">• {{ $script->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    {{-- Cookies analytiques --}}
                    <div class="bg-[#2D2A27] p-6 md:p-8 rounded-lg border border-zinc-700">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-andada font-semibold text-light mb-2">
                                    {{ __('messages.cookie_analytics') }}
                                </h3>
                                <p class="font-joan text-light opacity-80">
                                    {{ __('messages.cookie_analytics_desc') }}
                                </p>
                            </div>
                            <div class="ml-4">
                                <input type="checkbox" wire:model="analytics" class="w-6 h-6 accent-primary cursor-pointer">
                            </div>
                        </div>
                        @if($scripts['analytics']->count() > 0)
                            <div class="mt-4 pt-4 border-t border-zinc-700">
                                <p class="text-sm font-joan text-light opacity-70 mb-2">Scripts utilisés :</p>
                                <ul class="space-y-1">
                                    @foreach($scripts['analytics'] as $script)
                                        <li class="text-sm font-joan text-light opacity-80">• {{ $script->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    {{-- Cookies marketing --}}
                    <div class="bg-[#2D2A27] p-6 md:p-8 rounded-lg border border-zinc-700">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h3 class="text-xl font-andada font-semibold text-light mb-2">
                                    {{ __('messages.cookie_marketing') }}
                                </h3>
                                <p class="font-joan text-light opacity-80">
                                    {{ __('messages.cookie_marketing_desc') }}
                                </p>
                            </div>
                            <div class="ml-4">
                                <input type="checkbox" wire:model="marketing" class="w-6 h-6 accent-primary cursor-pointer">
                            </div>
                        </div>
                        @if($scripts['marketing']->count() > 0)
                            <div class="mt-4 pt-4 border-t border-zinc-700">
                                <p class="text-sm font-joan text-light opacity-70 mb-2">Scripts utilisés :</p>
                                <ul class="space-y-1">
                                    @foreach($scripts['marketing'] as $script)
                                        <li class="text-sm font-joan text-light opacity-80">• {{ $script->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Boutons d'action --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-end" data-aos="fade-up">
                    @if($hasConsent)
                        <button
                            wire:click="revokeConsent"
                            wire:confirm="{{ __('messages.cookie_revoke_confirm') }}"
                            class="px-8 py-3 bg-transparent border border-red-500 text-red-500 rounded hover:bg-red-500 hover:text-white transition-colors duration-300 font-andada font-semibold"
                        >
                            {{ __('messages.cookie_revoke') }}
                        </button>
                    @endif
                    <button
                        wire:click="savePreferences"
                        class="px-8 py-3 bg-primary text-background rounded hover:bg-primary/90 transition-colors duration-300 font-andada font-semibold"
                    >
                        {{ __('messages.cookie_save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
