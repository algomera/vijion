<div class="bg-gray-100 py-12">
	<div class="container">
		@if($coupons->count())
			<h3 class="text-3xl font-bold mt-10 mb-12">Il tuo carrello</h3>
			<div class="space-y-8">
				<div class="bg-white p-4 divide-y divide-gray-100">
					@foreach($coupons as $coupon)
						<x-cart-item :coupon="$coupon->coupon" wire:key="{{ $coupon->coupon->id }}"></x-cart-item>
					@endforeach
				</div>
				<div class="flex items-center justify-between bg-white w-full rounded-full p-2">
					<span class="ml-3 text-lg">Totale</span>
					<div class="flex items-center space-x-3 rounded-full bg-gray-50">
						<div class="flex items-center space-x-2 ml-1 text-sm text-gray-600 px-6">
							@if($coupons->count() === 1)
								<p class="font-bold">{{ $coupons->first()->coupon->amount }}{{ $coupons->first()->coupon->type === 'percentage' ? '%' : '€' }}
									sconto:</p>
							@else
								<p class="font-bold">{{ $coupons->count() }} coupons:</p>
							@endif
						</div>
						<div class="bg-brand rounded-full text-sm text-white py-2 px-4">
							<p class="font-bold">
								{{ $coupons->sum('coupon.coins') }} <span class="inline-block text-xs font-semibold">VIJI-COINS</span>
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
					<x-primary-button wire:click="buy" :disabled="auth()->user()->coins < $coupons->sum('coupon.coins')">
						Acquista {{ $coupons->count() === 1 ? 'Sconto' : 'Sconti' }}
					</x-primary-button>
				</div>
			</div>
		@else
			<div class="text-center">
				<svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
				     aria-hidden="true">
					<path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
					      stroke-width="2"
					      d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
				</svg>
				<h3 class="mt-2 text-3xl font-semibold text-gray-700">Il tuo carrello è vuoto.</h3>
				<div class="mt-6">
					<x-primary-button href="{{ route('home') }}">Inizia lo shopping</x-primary-button>
				</div>
			</div>
		@endif
	</div>
</div>
