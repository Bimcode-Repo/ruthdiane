<div class="bg-background pb-16">
    <div class="container mx-auto px-8">
        <div class="flex flex-col lg:flex-row gap-[20px]">
            <div class="bg-[#C4A882] flex items-center justify-center w-full lg:w-[460px] h-[150px] md:h-[175px]">
                <h2 class="text-4xl md:text-6xl text-[#3D3935] font-light font-andada">{{ __('messages.press') }}</h2>
            </div>

            <div class="bg-primary flex flex-col md:flex-row items-center justify-between px-6 md:px-12 py-6 md:py-0 w-full lg:w-[840px] h-auto md:h-[175px] gap-6 md:gap-0">
                <div class="flex flex-col items-center">
                    <div class="flex gap-2 mb-3">
                        <img src="{{ asset('assets/icons/apr-a.png') }}" alt="A" class="w-12 h-12 md:w-16 md:h-16">
                        <img src="{{ asset('assets/icons/apr-p.png') }}" alt="P" class="w-12 h-12 md:w-16 md:h-16">
                        <img src="{{ asset('assets/icons/apr-r.png') }}" alt="R" class="w-12 h-12 md:w-16 md:h-16">
                    </div>
                    <p class="text-[#3D3935] text-xs tracking-wider text-center">{{ __('messages.apr_subtitle') }}</p>
                </div>

                <div class="text-center md:text-right">
                    <p class="text-[#3D3935] text-[24px] md:text-[40px] font-light mb-2">01 23 45 67 87 10</p>
                    <p class="text-[#3D3935] text-[24px] md:text-[40px] font-light">contact@rsi.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
