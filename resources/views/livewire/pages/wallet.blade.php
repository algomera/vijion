<div x-data class="bg-gray-100 py-12">
	<div class="container">
		@if($purchases->count())
			<h3 class="text-3xl font-bold mt-10 mb-12">Il tuo Portafoglio</h3>
			<div class="space-y-8">
				<div class="bg-white p-4 divide-y divide-gray-100">
					@foreach($purchases as $purchase)
						<div class="flex items-center justify-between">
							<div class="flex items-center space-x-5 py-5">
								<div class="hidden relative w-32 aspect-square md:block">
									@if(!$purchase->coupon_code->coupon->bg)
										<img src="{{ $purchase->coupon_code->coupon->brand->category->image_path }}"
										     alt="{{ $purchase->coupon_code->coupon->brand->name }}"
										     class="aspect-square w-full object-cover">
									@else
										<img src="{{ $purchase->coupon_code->coupon->bg }}"
										     alt="{{ $purchase->coupon_code->coupon->brand->name }}"
										     class="aspect-square w-full object-cover">
									@endif
								</div>
								<div class="flex flex-col space-y-3">
									<div>
										<h5 class="text-gray-900 font-semibold">{{ $purchase->coupon_code->coupon->brand->category->name }}</h5>
										<div class="flex items-center space-x-2">
											<span class="text-brand font-semibold text-sm">{{ $purchase->coupon_code->coupon->brand->name }}</span>
											<span class="text-gray-400">&middot;</span>
											<span x-tooltip="{{ $purchase->purchased_at->format('d-m-Y H:i:s') }}"
											      class="text-gray-400 font-semibold text-sm">{{ $purchase->purchased_at->diffForHumans() }}</span>
										</div>
									</div>
									<div class="block md:hidden">
										<div class="flex items-center space-x-2">
											<span class="text-gray-900 font-semibold text-sm">{{ $purchase->coupon_code->coupon->amount }}{{ $purchase->coupon_code->coupon->type === 'percentage' ? '%' : '€' }}</span>
											<span class="text-gray-400">&middot;</span>
											<div class="flex items-center space-x-1 bg-white text-brand">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
												     stroke-width="1.5"
												     stroke="currentColor" class="w-5 h-5 flex-shrink-0">
													<path stroke-linecap="round" stroke-linejoin="round"
													      d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
													<path stroke-linecap="round" stroke-linejoin="round"
													      d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
												</svg>
												<span class="font-black">{{ $purchase->coupon_code->coupon->coins }}</span>
											</div>
											<span class="text-gray-400">&middot;</span>
											<span class="text-gray-900 font-bold">{{ $purchase->coupon_code->code }}</span>
										</div>
									</div>
									<div class="hidden md:flex">
										<div class="flex flex-col justify-center text-center bg-gray-50 border border-gray-100 h-16 px-8 py-1.5">
											<span class="leading-none text-2xl font-bold">{{ $purchase->coupon_code->coupon->amount }}{{ $purchase->coupon_code->coupon->type === 'percentage' ? '%' : '€' }}</span>
											<span class="text-xs text-gray-500">(sconto)</span>
										</div>
										<div class="flex items-center space-x-1 bg-white text-brand border border-gray-100 border-l-0 h-16 p-3">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
											     stroke-width="1.5"
											     stroke="currentColor" class="w-6 h-6 flex-shrink-0">
												<path stroke-linecap="round" stroke-linejoin="round"
												      d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
												<path stroke-linecap="round" stroke-linejoin="round"
												      d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"/>
											</svg>
											<span class="text-2xl font-black">{{ $purchase->coupon_code->coupon->coins }}</span>
										</div>
										<div class="flex flex-col justify-center text-center bg-gray-50 border border-gray-100 border-l-0 h-16 px-8 py-1.5">
											<span class="leading-none text-2xl font-bold">{{ $purchase->coupon_code->code }}</span>
										</div>
									</div>
								</div>
							</div>
							<div>
								{!! \SimpleSoftwareIO\QrCode\Facades\QrCode::generate($purchase->coupon_code->code) !!}
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@else
			<div class="text-center">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
				     stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
					<path stroke-linecap="round" stroke-linejoin="round"
					      d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3"/>
				</svg>

				<h3 class="mt-2 text-3xl font-semibold text-gray-700">Il tuo portafoglio è vuoto.</h3>
				<div class="mt-6">
					<x-primary-button href="{{ route('home') }}">Inizia lo shopping</x-primary-button>
				</div>
			</div>
		@endif
	</div>
</div>