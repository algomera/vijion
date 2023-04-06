<div>
	<x-header>
		<x-slot:title>{{ $coupon->uuid }}</x-slot:title>
		<x-slot:subtitle>
			<div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
				<div class="mt-2 flex items-center text-sm text-gray-400">
					<x-heroicon-o-building-storefront
							class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-building-storefront>
					{{ $coupon->brand->name }}
				</div>
				<div class="mt-2 flex items-center text-sm text-gray-400">
					@if($coupon->type === 'cash')
						<x-heroicon-o-banknotes
								class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-banknotes>
						{{ $coupon->amount }}€
					@elseif($coupon->type === 'percentage')
						<x-heroicon-o-receipt-percent
								class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-receipt-percent>
						{{ $coupon->amount }} %
					@endif
				</div>
				<div class="mt-2 flex items-center text-sm text-brand">
					<x-heroicon-o-play-circle class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-play-circle>
					{{ $coupon->coins }} VIJI-COINS
				</div>
				<div class="mt-2 flex items-center text-sm text-gray-400">
					<x-heroicon-o-clock class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-clock>
					{{ $coupon->expires_date ? $coupon->expires_date->format('d-m-Y') : 'Nessuna scadenza' }}
				</div>
			</div>
		</x-slot:subtitle>
		<x-slot:actions>
			<x-primary-button
					wire:click="$emit('openModal', 'admin.pages.brands.edit-coupon', {{ json_encode(['coupon' => $coupon->id]) }})">
				Modifica
			</x-primary-button>
		</x-slot:actions>
	</x-header>
	<div class="mb-5">
		<div class="block">
			<nav class="flex space-x-4" aria-label="Tabs">
				<span wire:click="$set('active', true)"
				      class="{{ $active ? 'bg-brand-purple-light/10 text-brand-purple' : 'text-gray-500 hover:text-gray-700 hover:cursor-pointer' }} rounded-md px-3 py-2 text-sm font-medium">Attivi <span
							class="{{ $active ? 'bg-brand-purple-light/20 text-brand-purple' : 'bg-gray-300' }} text-xs ml-1 py-0.5 px-2 rounded-full">{{ $coupon->codes()->active(true)->count() }}</span></span>
				<span wire:click="$set('active', false)"
				      class="{{ !$active ? 'bg-brand-purple-light/10 text-brand-purple' : 'text-gray-500 hover:text-gray-700 hover:cursor-pointer' }} rounded-md px-3 py-2 text-sm font-medium">Erogati <span
							class="{{ !$active ? 'bg-brand-purple-light/20 text-brand-purple' : 'bg-gray-300' }} text-xs ml-1 py-0.5 px-2 rounded-full">{{ $coupon->codes()->active(false)->count() }}</span></span>
			</nav>
		</div>
	</div>
	<div class="overflow-hidden bg-white shadow sm:rounded-md">
		<div class="p-4 sm:p-6 lg:p-8">
			<div class="sm:flex sm:items-center sm:justify-between">
				<div class="sm:flex-auto max-w-2xl">
					<x-input type="text" wire:model.debouce.500ms="search" wire:keydown.escape="$set('search', '')"
					         placeholder="Cerca.."></x-input>
				</div>
				<div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
					@if($coupon_codes_file)
						<x-primary-button type="button"
						                  wire:click="couponCodesImport"
						                  class="!py-3 !px-7 !bg-green-600 hover:!bg-green-700 focus:ring-green-500">
							<x-heroicon-o-cloud-arrow-up class="w-5 h-5 text-white"></x-heroicon-o-cloud-arrow-up>
						</x-primary-button>
					@else
						<label class="inline-flex justify-center items-center rounded-md py-3 px-7 transition duration-300 @if($coupon_codes_file) bg-green-600 hover:bg-green-700 focus:ring-green-500 @else bg-brand-purple hover:bg-brand-purple-light focus:ring-brand-purple @endif hover:cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-purple disabled:cursor-not-allowed disabled:opacity-25">
							<input wire:model="coupon_codes_file"
							       type="file" name="coupon_codes_file"
							       id="coupon_codes_file"
							       class="sr-only"/>
							<x-heroicon-o-cloud-arrow-up wire:loading.remove
							                             wire:target="coupon_codes_file"
							                             class="w-5 h-5 text-white"></x-heroicon-o-cloud-arrow-up>
							<svg wire:loading
							     wire:target="coupon_codes_file" class="animate-spin w-5 h-5 text-white"
							     xmlns="http://www.w3.org/2000/svg"
							     fill="none" viewBox="0 0 24 24">
								<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
								        stroke-width="4"></circle>
								<path class="opacity-75" fill="currentColor"
								      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
							</svg>
						</label>
					@endif
				</div>
			</div>
		</div>
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($codes as $code)
				<li>
					<div class="block hover:bg-gray-50">
						<div class="flex items-center px-4 py-4 sm:px-6">
							<div class="flex min-w-0 flex-1 items-center">
								<div class="min-w-0 flex-1 px-2 md:grid md:grid-cols-2 md:gap-4">
									<div class="flex items-center">
										<p class="truncate text-sm font-bold text-gray-800">{{ $code->code }}</p>
									</div>
									<div>
										@if(!$code->active)
											<p class="text-sm text-gray-900">
												Acquistato da
												<a href="{{ route('users.show', $code->purchase->user->id) }}"
												   class="font-semibold hover:underline">{{ $code->purchase->user->fullName }}</a>
												il
												<span class="font-semibold">{{ $code->purchase->purchased_at->format('d-m-Y H:i:s') }}</span>
											</p>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			@empty
				<p class="w-full max-w-0 py-8 pl-4 pr-3 text-sm font-medium text-gray-400 text-center sm:w-auto sm:max-w-none sm:pl-3">
					Nessun codice sconto trovato.
				</p>
			@endforelse
		</ul>
	</div>
	<div class="mt-5">
		{{ $codes->links() }}
	</div>
</div>