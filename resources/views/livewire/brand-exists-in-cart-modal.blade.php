<div class="p-4">
	<div class="flex flex-col items-center space-y-7">
		<div class="text-center">
			<h3 class="text-base font-semibold leading-6 text-gray-900">
                {{ __('general.titolo_coupon_presente_in_carrello', ['brand' => $coupon->brand->name]) }}
                </h3>
			<div class="mt-2">
				<p class="text-sm text-gray-500">
					{{ __('general.testo_coupon_presente_in_carrello') }}
				</p>
			</div>
			<div class="flex items-center space-x-3 mt-4 md:space-x-8">
				<div class="flex flex-1 lg:min-w-[150px] flex-col justify-center items-center rounded-full">
					<span class="text-gray-800 font-bold">{{ __('general.sconto') }}</span>
					<span class="text-6xl text-brand font-bold">{{ $existing->amount }}{{ $existing->type === 'percentage' ? '%' : '€' }}</span>
					<span class="text-xs text-brand">{{ $existing->coins }} {{ __('general.VIJI-COINS') }}</span>
				</div>
				<p class="flex flex-1 flex-shrink-0 whitespace-nowrap items-center mt-7 text-sm text-gray-400 space-x-1">
					<span>{{ __('general.sostituisci con') }}</span>
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
					     stroke="currentColor" class="mt-px w-4 h-4">
						<path stroke-linecap="round" stroke-linejoin="round"
						      d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/>
					</svg>
				</p>
				<div class="flex flex-1 lg:min-w-[150px] flex-col justify-center items-center rounded-full">
					<span class="text-gray-800 font-bold">{{ __('general.sconto') }}</span>
					<span class="text-6xl text-brand font-bold">{{ $to_be_add->amount }}{{ $to_be_add->type === 'percentage' ? '%' : '€' }}</span>
					<span class="text-xs text-brand">{{ $to_be_add->coins }} {{ __('general.VIJI-COINS') }}</span>
				</div>
			</div>
		</div>
		<div class="flex items-center w-full space-x-4">
			<x-secondary-button wire:click="$emit('closeModal')" class="w-full">
				{{ __('general.Annulla') }}
			</x-secondary-button>
			<x-primary-button wire:click="replaceCoupon" class="w-full">
				{{ __('general.Sostituisci') }}
			</x-primary-button>
		</div>
	</div>
</div>
