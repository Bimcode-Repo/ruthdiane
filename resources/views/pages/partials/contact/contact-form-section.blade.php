<div class="bg-background">
    <div class="container mx-auto px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-baseline gap-8 md:gap-12 mb-12 md:mb-16">
            <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-6">
                <h2 class="text-[40px] md:text-[60px] text-light font-bold" font-andada>{{ __('messages.lorem_title') }}</h2>
                <div class="w-[40px] md:w-[55px] h-[1px] bg-light md:order-first"></div>
            </div>

            <div>
                <p class="text-light text-[18px] md:text-[25px] leading-relaxed" font-joan>
                    {{ __('messages.lorem_medium') }}
                </p>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-[20px] mb-[20px]">
            <div class="bg-[#2D2A27] p-6 md:p-12 w-full lg:w-[700px] h-auto lg:h-[650px]">
                @if($successMessage)
                    <div class="mb-6 p-4 bg-green-600/20 border border-green-500 rounded">
                        <p class="text-green-400 text-sm md:text-base">{{ $successMessage }}</p>
                    </div>
                @endif

                @if($errorMessage)
                    <div class="mb-6 p-4 bg-red-600/20 border border-red-500 rounded">
                        <p class="text-red-400 text-sm md:text-base">{{ $errorMessage }}</p>
                    </div>
                @endif

                <form wire:submit.prevent="submitForm" class="space-y-6 md:space-y-8">
                    <div>
                        <input
                            type="text"
                            wire:model="name"
                            placeholder="{{ __('messages.form_name') }}"
                            class="w-full bg-transparent border-b border-gray-500 text-white placeholder-gray-400 pb-3 focus:outline-none focus:border-white transition-colors text-base md:text-lg">
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input
                            type="email"
                            wire:model="email"
                            placeholder="{{ __('messages.form_email') }}"
                            class="w-full bg-transparent border-b border-gray-500 text-white placeholder-gray-400 pb-3 focus:outline-none focus:border-white transition-colors text-base md:text-lg">
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input
                            type="tel"
                            wire:model="phone"
                            placeholder="{{ __('messages.form_phone') }}"
                            class="w-full bg-transparent border-b border-gray-500 text-white placeholder-gray-400 pb-3 focus:outline-none focus:border-white transition-colors text-base md:text-lg">
                        @error('phone')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <textarea
                            wire:model="message"
                            placeholder="{{ __('messages.form_message') }}"
                            rows="4"
                            class="w-full bg-transparent border-b border-gray-500 text-white placeholder-gray-400 pb-3 focus:outline-none focus:border-white transition-colors text-base md:text-lg resize-none"></textarea>
                        @error('message')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="bg-[#C4A882] text-[#3D3935] px-8 md:px-12 py-2.5 md:py-3 hover:opacity-90 transition-opacity text-base md:text-lg font-light">
                            {{ __('messages.form_submit') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="relative overflow-hidden w-full lg:w-[600px] h-[500px] md:h-[650px]">
                <img src="{{ asset('medias/images/contact/contact-info.png') }}"
                     alt="Interior"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/30"></div>

                <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                    <div class="flex gap-4 md:gap-6 mb-8 md:mb-[60px]">
                        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                            <img src="{{ asset('assets/icons/linkedin.svg') }}" alt="LinkedIn" class="w-[20px] h-[20px] md:w-[28px] md:h-[28px]">
                        </a>
                        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                            <img src="{{ asset('assets/icons/instagram.svg') }}" alt="Instagram" class="w-[20px] h-[20px] md:w-[28px] md:h-[28px]">
                        </a>
                        <a href="#" target="_blank" class="text-light hover:text-primary transition-colors duration-300">
                            <img src="{{ asset('assets/icons/facebook.svg') }}" alt="Facebook" class="w-[20px] h-[20px] md:w-[28px] md:h-[28px]">
                        </a>
                    </div>

                    <p class="text-white text-[24px] md:text-[40px] mb-8 md:mb-[60px]" font-joan>01 23 45 67 87 10</p>

                    <p class="text-white text-[20px] md:text-[40px]" font-joan>contact@rsi.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
