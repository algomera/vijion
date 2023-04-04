<div>
	<x-slot:header>
		<div class="min-w-0 flex-1">
			<h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
				Brands
			</h2>
		</div>
	</x-slot:header>
	<div class="overflow-hidden bg-white shadow sm:rounded-md">
		<div class="p-4 sm:p-6 lg:p-8">
			<div class="sm:flex sm:items-center sm:justify-between">
				<div class="sm:flex-auto max-w-2xl">
					<x-input type="text" wire:model.debouce.500ms="search" wire:keydown.escape="$set('search', '')"
					         placeholder="Cerca.."></x-input>
				</div>
				<div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
					<x-primary-button>Nuovo Brand</x-primary-button>
				</div>
			</div>
		</div>
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($brands as $brand)
				<li>
					<a href="{{ route('brands.show', $brand->slug) }}" class="block hover:bg-gray-50">
						<div class="flex items-center px-4 py-4 sm:px-6">
							<div class="flex min-w-0 flex-1 items-center">
								<div class="flex-shrink-0">
									<img class="w-14" src="{{ $brand->logo_path }}"
									     alt="">
								</div>
								<div class="min-w-0 flex-1 px-8 md:grid md:grid-cols-2 md:gap-4">
									<div class="flex items-center">
										<p class="truncate text-sm font-bold text-gray-800">{{ $brand->name }}</p>
									</div>
									<div>
										<p class="mt-2 flex items-center text-sm text-gray-500">
											<x-heroicon-o-archive-box
													class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-archive-box>
											{{ $brand->category->name }}
										</p>
										<p class="mt-2 flex items-center text-sm text-gray-500">
											<x-heroicon-o-tag
													class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-tag>
											Coupons: {{ $brand->coupons->count() }}
										</p>
									</div>
								</div>
							</div>
							<div>
								<svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
								     aria-hidden="true">
									<path fill-rule="evenodd"
									      d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
									      clip-rule="evenodd"/>
								</svg>
							</div>
						</div>
					</a>
				</li>
			@empty
				<p class="w-full max-w-0 py-8 pl-4 pr-3 text-sm font-medium text-gray-400 text-center sm:w-auto sm:max-w-none sm:pl-3">
					Nessun brand trovato.
				</p>
			@endforelse
		</ul>
	</div>
	<div class="mt-5">
		{{ $brands->links() }}
	</div>
</div>
