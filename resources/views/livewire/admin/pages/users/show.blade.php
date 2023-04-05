<div>
	<x-header>
		<x-slot:title>{{ $user->fullName }}</x-slot:title>
		<x-slot:subtitle>
			<div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
				<div class="mt-2 flex items-center text-sm text-gray-500">
					<x-heroicon-o-envelope class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"></x-heroicon-o-envelope>
					{{ $user->email }}
				</div>
				<div class="mt-2 flex items-center text-sm text-brand">
					<x-heroicon-o-play-circle class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-play-circle>
					{{ $user->coins }} VIJI-COINS
				</div>
			</div>
		</x-slot:subtitle>
	</x-header>
	<div class="overflow-hidden bg-white shadow sm:rounded-md">
		<div class="p-4 sm:p-6 lg:p-8">
			<div class="sm:flex sm:items-center sm:justify-between">
				<div class="sm:flex-auto max-w-2xl">
					<x-input type="text" wire:model.debouce.500ms="search" wire:keydown.escape="$set('search', '')"
					         placeholder="Cerca.."></x-input>
				</div>
			</div>
		</div>
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($purchases as $purchase)
				<li>
					<div class="block hover:bg-gray-50">
						<div class="flex items-center px-4 py-4 sm:px-6">
							<div class="flex min-w-0 flex-1 items-center">
								<div class="flex-shrink-0">
									<img class="w-14" src="{{ $purchase->coupon_code->coupon->brand->logo_path }}"
									     alt="">
								</div>
								<div class="min-w-0 flex-1 px-8 md:grid md:grid-cols-2 md:gap-4">
									<div class="flex items-center">
										<p class="truncate text-sm font-bold text-gray-800">{{ $purchase->coupon_code->code }}</p>
									</div>
									<div>
										<p class="text-sm text-gray-900">
											Acquistato il
											<time datetime="{{ $purchase->purchased_at->format('Y-m-d') }}"
											      class="font-semibold">{{ $purchase->purchased_at->format('d-m-Y H:i:s') }}</time>
										</p>
										<a href="{{ route('coupons.show', ['brand' => $purchase->coupon_code->coupon->brand->slug, 'coupon' => $purchase->coupon_code->coupon->uuid]) }}"
										   class="mt-2 flex items-center text-sm text-gray-500 hover:underline">
											<x-heroicon-o-tag
													class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-tag>
											{{ $purchase->coupon_code->coupon->uuid }}
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			@empty
				<p class="w-full max-w-0 py-8 pl-4 pr-3 text-sm font-medium text-gray-400 text-center sm:w-auto sm:max-w-none sm:pl-3">
					Nessun acquisto trovato.
				</p>
			@endforelse
		</ul>
	</div>
	<div class="mt-5">
		{{ $purchases->links() }}
	</div>
</div>
