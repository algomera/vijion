<div class="bg-gray-100 py-12">
	<div class="container">
		@if($coupons->count())
			<h3 class="text-3xl font-bold mt-10 mb-12">{{ __('general.Il tuo carrello') }}</h3>
			<div class="space-y-8">
				<div class="bg-white p-4 divide-y divide-gray-100">
					@foreach($coupons as $coupon)
						<x-cart-item :coupon="$coupon->coupon" wire:key="{{ $coupon->coupon->id }}"></x-cart-item>
					@endforeach
				</div>
				<div class="flex items-center justify-between bg-white w-full rounded-full p-2">
					<span class="ml-3 text-lg">{{ __('general.Totale') }}</span>
					<div class="flex items-center space-x-3 rounded-full bg-gray-50">
						<div class="flex items-center space-x-2 ml-1 text-sm text-gray-600 px-6">
							@if($coupons->count() === 1)
								<p class="font-bold">{{ $coupons->first()->coupon->amount }}{{ $coupons->first()->coupon->type === 'percentage' ? '%' : '€' }}
									{{ __('general.sconto') }}:</p>
							@else
								<p class="font-bold">{{ $coupons->count() }} {{ __('general.coupons') }}:</p>
							@endif
						</div>
						<div class="bg-brand rounded-full text-sm text-white py-2 px-4">
							<p class="font-bold">
								{{ $coupons->sum('coupon.coins') }} <span class="inline-block text-xs font-semibold">{{ __('general.VIJI-COINS') }}</span>
							</p>
						</div>
					</div>
				</div>
				<div class="flex items-center justify-between">
					<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
						<div class="flex-auto">
							<a href="{{ route('home') }}"
							   class="flex items-center space-x-3 text-brand hover:text-brand">
								<span>{{ __('general.Continua lo shopping') }}</span>
								<svg xmlns="http://www.w3.org/2000/svg" fill="none"
								     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
								     class="w-5 h-5 transform group-hover:translate-x-1 transition">
									<path stroke-linecap="round" stroke-linejoin="round"
									      d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"/>
								</svg>
							</a>
						</div>
					</div>
					@if(auth()->user()->coins < $coupons->sum('coupon.coins'))
						<div x-data x-tooltip="{{ __('general.VIJI-COINS insufficienti') }}">
							@endif
							<x-primary-button wire:click="buy"
							                  :disabled="auth()->user()->coins < $coupons->sum('coupon.coins')">
                                {{ trans_choice('general.Acquista Sconto', $coupons->count()) }}
							</x-primary-button>
							@if(auth()->user()->coins < $coupons->sum('coupon.coins'))
						</div>
					@endif
				</div>
			</div>
		@else
			<div class="text-center">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				     stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
					<path stroke-linecap="round" stroke-linejoin="round"
					      d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
				</svg>
				<h3 class="mt-2 text-3xl font-semibold text-gray-700">{{ __('general.Il tuo carrello è vuoto.') }}</h3>
				<div class="mt-6">
					<x-primary-button href="{{ route('home') }}">{{ __('general.Inizia lo shopping') }}</x-primary-button>
				</div>
			</div>
		@endif
	</div>
</div>
