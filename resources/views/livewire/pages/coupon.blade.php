<div class="bg-gray-100">
	<div class="container py-14">
		<div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
			<div class="order-2 flex flex-col justify-center space-y-8 w-full lg:max-w-md lg:order-none">
				@if($coupon->brand->rules->count())
					<div>
						<h3 class="text-xl font-bold mb-4">
                            {{ __('general.titolo_regole', ['brand' => $coupon->brand->name]) }}
                        </h3>
						<ul class="list-[circle] space-y-2">
							@foreach($coupon->brand->rules()->orderBy('order')->get() as $rule)
								<li>{{ $rule->body }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div>
					<h3 class="text-xl font-bold mb-4">
                        {{ __('general.titolo_coins', ['brand' => $coupon->brand->name]) }}
                    </h3>
					<p>{{ __('general.testo_coins') }}</p>
				</div>
				<div class="group relative flex items-center gap-x-6 rounded-lg text-sm leading-6">
					<div class="flex-auto">
						<a href="#rules"
						   class="flex items-center space-x-3 text-brand hover:text-brand">
							<span>{{ __('general.Leggi le regole fondamentali') }}</span>
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							     stroke-width="1.5" stroke="currentColor"
							     class="w-5 h-5 transform group-hover:translate-y-1 transition">
								<path stroke-linecap="round" stroke-linejoin="round"
								      d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3"/>
							</svg>
						</a>
					</div>
				</div>
			</div>
			<div class="order-1 lg:order-none">
				<h3 class="text-2xl font-bold mb-4">{{ $coupon->brand->category->name }}</h3>
				<div class="flex flex-col w-full p-4 bg-white overflow-hidden">
					<div class="flex-1 pb-0">
						<div class="relative w-full h-full">
							@if(!$coupon->bg)
								<img src="{{ asset($coupon->brand->category->image_path) }}" alt=""
								     class="aspect-video w-full object-cover">
							@else
								<img src="{{ asset($coupon->bg) }}" alt="" class="aspect-video w-full object-cover">
							@endif
							<div class="absolute inset-0 grid place-items-center {{ $coupon->text_color }}">
								<div class="flex flex-col justify-center items-center bg-white w-32 h-32 rounded-full sm:w-44 sm:h-44">
									<span class="text-gray-800 font-bold">{{ __('general.sconto') }}</span>
									<span class="text-5xl text-brand font-bold sm:text-6xl">{{ $coupon->amount }}{{ $coupon->type === 'percentage' ? '%' : '€' }}</span>
									@if($coupon->expires_date)
										<span class="underline text-gray-800 text-xs">{{ __('general.validita_coupon') }}</span>
										<span class="uppercase text-brand font-bold">{{ \Carbon\Carbon::parse($coupon->expires_date)->monthName }}</span>
									@endif
								</div>
							</div>
						</div>
					</div>
					<div class="flex flex-col space-y-2 items-center justify-between rounded-full bg-gray-50 py-1.5 px-1.5 mt-4 sm:flex-row sm:space-y-0">
						<div class="flex items-center ml-1 text-gray-700 px-4 whitespace-nowrap">
							<p>{{ __('general.L\'acquisto di questo prodotto equivale a:') }}</p>
						</div>
						<div class="bg-brand rounded-full text-white py-2.5 px-4 whitespace-nowrap">
							<p class="font-bold text-lg">
								{{ $coupon->coins }} <span class="inline-block text-xs font-bold">{{ __('general.VIJI-COINS') }}</span>
							</p>
						</div>
					</div>
					<div class="grid items-center grid-cols-1 gap-3 mt-5 sm:grid-cols-2 sm:gap-8">
						<img src="{{ asset($coupon->brand->logo_path) }}" alt="{{ $coupon->brand->name }}"
						     class="py-2 max-h-24 max-w-[200px] mx-auto">
						<x-primary-button wire:click="addToCart"
						                  :disabled="auth()->check() && auth()->user()->couponInCart($coupon->id) || $coupon->codes()->active()->count() <= 0">
							{{ auth()->check() && auth()->user()->couponInCart($coupon->id) ? __('general.Aggiunto al carrello') : __('general.Aggiungi al carrello') }}
						</x-primary-button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="rules" class="bg-white py-12">
	<div class="container max-w-5xl">
		<h3 class="text-xl font-bold mb-8">
            {!! __('general.regole_spesa_coins') !!}
		</h3>
		<div class="space-y-6">
			<div class="space-y-2">
				<div class="flex font-bold space-x-2.5">
					<span class="text-brand">1</span>
					<p>{{ __('general.titolo_punto_1', ['brand' => $coupon->brand->name]) }}</p>
				</div>
				<p class="text-gray-700 leading-relaxed">
                    {{ __('general.testo_punto_1', ['brand' => $coupon->brand->name]) }}
				</p>
			</div>
			<div class="space-y-2">
				<div class="flex font-bold space-x-2.5">
					<span class="text-brand">2</span>
					<p>{{ __('general.titolo_punto_2') }}</p>
				</div>
				<p class="text-gray-700 leading-relaxed">{{ __('general.testo_punto_2') }}</p>
			</div>
			<div class="space-y-2">
				<div class="flex font-bold space-x-2.5">
					<span class="text-brand">3</span>
					<p>{{ __('general.titolo_punto_3') }}</p>
				</div>
				<p class="text-gray-700 leading-relaxed">
                    {{ __('general.testo_punto_3', ['brand' => $coupon->brand->name]) }}
				</p>
			</div>
			<hr class="!my-9">
			<p class="text-gray-700 leading-relaxed">
				{{ __('general.testo_punto_finale', ['brand' => $coupon->brand->name]) }}
			</p>
		</div>
	</div>
</div>
