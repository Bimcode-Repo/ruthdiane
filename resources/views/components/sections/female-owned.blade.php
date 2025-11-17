<div class="flex flex-col lg:flex-row lg:h-[470px]">
    <div class="w-full lg:w-[470px] h-[300px] lg:h-[470px] flex-shrink-0">
        <img src="{{ asset('medias/images/about/female-owner.png') }}"
             alt="Female Owner"
             class="w-full h-full object-cover">
    </div>

    <div class="bg-[#E8C5CA] flex flex-col justify-center px-6 md:px-12 lg:px-[80px] py-8 md:py-12 lg:py-[150px] flex-1">
        <div class="w-full">
            <div class="mb-6 md:mb-8 lg:mb-10">
                <h1 class="text-[32px] md:text-[40px] lg:text-[50px] text-[#3D3935] font-semibold leading-tight font-andada">
                    {{ __('messages.female_owned_title') }}
                </h1>
            </div>

            <p class="text-[20px] md:text-[24px] lg:text-[30px] text-[#3D3935] leading-relaxed">
                {{ __('messages.female_owned_text') }}
            </p>
        </div>
    </div>
</div>
