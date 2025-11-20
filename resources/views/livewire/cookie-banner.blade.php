<div>
    @if($showBanner)
        <div class="fixed bottom-0 left-0 right-0 bg-[#2D2A27] text-light shadow-2xl z-[9998] border-t border-primary/20"
             x-data
             x-on:consent-saved.window="window.location.reload()">
            <div class="max-w-8xl mx-auto px-6 md:px-12 py-6 md:py-8">
                @if(!$showCustomize)
                    {{-- Banner principal --}}
                    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                        <div class="flex-1">
                            <h3 class="text-xl font-andada font-semibold mb-2">
                                {{ __('messages.cookie_title') }}
                            </h3>
                            <p class="text-sm font-joan opacity-90 leading-relaxed">
                                {{ __('messages.cookie_description') }}
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full lg:w-auto">
                            <button
                                wire:click="refuseAll"
                                class="px-6 py-3 bg-transparent border border-light text-light rounded hover:bg-light hover:text-background transition-colors duration-300 font-andada font-semibold whitespace-nowrap"
                            >
                                {{ __('messages.cookie_refuse') }}
                            </button>
                            <button
                                wire:click="customize"
                                class="px-6 py-3 bg-transparent border border-primary text-primary rounded hover:bg-primary hover:text-background transition-colors duration-300 font-andada font-semibold whitespace-nowrap"
                            >
                                {{ __('messages.cookie_customize') }}
                            </button>
                            <button
                                wire:click="acceptAll"
                                class="px-6 py-3 bg-primary text-background rounded hover:bg-primary/90 transition-colors duration-300 font-andada font-semibold whitespace-nowrap"
                            >
                                {{ __('messages.cookie_accept') }}
                            </button>
                        </div>
                    </div>
                @else
                    {{-- Modal de personnalisation --}}
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-andada font-semibold">
                                {{ __('messages.cookie_preferences') }}
                            </h3>
                            <button
                                wire:click="$set('showCustomize', false)"
                                class="text-light hover:text-primary transition-colors"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            {{-- Cookies nécessaires --}}
                            <div class="bg-background-darker p-4 rounded-lg border border-zinc-700">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-andada font-semibold">{{ __('messages.cookie_necessary') }}</h4>
                                    <input type="checkbox" wire:model="necessary" disabled checked class="w-5 h-5 accent-primary cursor-not-allowed opacity-50">
                                </div>
                                <p class="text-sm font-joan opacity-80">
                                    {{ __('messages.cookie_necessary_desc') }}
                                </p>
                            </div>

                            {{-- Cookies analytiques --}}
                            <div class="bg-background-darker p-4 rounded-lg border border-zinc-700">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-andada font-semibold">{{ __('messages.cookie_analytics') }}</h4>
                                    <input type="checkbox" wire:model="analytics" class="w-5 h-5 accent-primary cursor-pointer">
                                </div>
                                <p class="text-sm font-joan opacity-80">
                                    {{ __('messages.cookie_analytics_desc') }}
                                </p>
                            </div>

                            {{-- Cookies marketing --}}
                            <div class="bg-background-darker p-4 rounded-lg border border-zinc-700">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-andada font-semibold">{{ __('messages.cookie_marketing') }}</h4>
                                    <input type="checkbox" wire:model="marketing" class="w-5 h-5 accent-primary cursor-pointer">
                                </div>
                                <p class="text-sm font-joan opacity-80">
                                    {{ __('messages.cookie_marketing_desc') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3">
                            <button
                                wire:click="refuseAll"
                                class="px-6 py-3 bg-transparent border border-light text-light rounded hover:bg-light hover:text-background transition-colors duration-300 font-andada font-semibold"
                            >
                                {{ __('messages.cookie_refuse') }}
                            </button>
                            <button
                                wire:click="saveCustom"
                                class="px-6 py-3 bg-primary text-background rounded hover:bg-primary/90 transition-colors duration-300 font-andada font-semibold"
                            >
                                {{ __('messages.cookie_save') }}
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
