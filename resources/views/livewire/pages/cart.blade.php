<div class="bg-gray-100 py-12">
    <div class="container">
        <h3 class="text-3xl font-bold mt-10 mb-12">Il tuo carrello</h3>
        <div class="space-y-8">
            <div class="bg-white p-4 divide-y divide-gray-100">
                <x-cart-item category="Abbigliamento e Scarpe" brand="YOOX" amount="35%" coins="85"></x-cart-item>
            </div>
            <div class="flex items-center justify-between bg-white w-full rounded-full p-2">
                <span class="ml-3 text-lg">Totale</span>
                <div class="flex items-center space-x-3 rounded-full bg-gray-50">
                    <div class="flex items-center space-x-2 ml-1 text-sm text-gray-600 px-6">
                        <p class="font-bold">35% sconto:</p>
                    </div>
                    <div class="bg-brand rounded-full text-sm text-white py-2 px-4">
                        <p class="font-bold">
                            85 <span class="inline-block text-xs font-semibold">VIJI-COINS</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
                    <div class="flex-auto">
                        <a href="{{ route('home') }}"
                           class="flex items-center space-x-3 text-brand hover:text-brand">
                            <span>Continua lo shopping</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                 class="w-5 h-5 transform group-hover:translate-x-1 transition">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <button wire:click="buy" type="button"
                        class="rounded-md bg-[#63184c] py-4 px-12 text-xs font-semibold text-white uppercase shadow-sm transition duration-300 hover:bg-[#7a2962] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#63184c]">
                    Acquista sconto
                </button>
            </div>
        </div>
    </div>
</div>
