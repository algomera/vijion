<div class="p-4">
	<div class="space-y-8">
		<h2 class="text-base font-semibold leading-7 text-gray-900">Offerte della settimana</h2>
		<div class="grid grid-cols-2 gap-8">
			<div class="space-y-3">
				<x-input wire:model.debounce.500="search_all" type="text" name="search" placeholder="Cerca tra tutti i Brand.."></x-input>
				<div class="min-h-[384px] max-h-96 overflow-y-scroll">
					<ul role="list" class="space-y-3">
						@forelse($all_brands as $brand)
							<li wire:click="add({{ $brand->id }})" wire:key="all-{{ $brand->id }}" class="group flex items-center justify-between overflow-hidden border border-gray-200 rounded-md bg-white px-4 py-3 hover:cursor-pointer">
								<span class="text-xs font-semibold">{{ $brand->name }}</span>
								<x-heroicon-o-chevron-right class="w-3 h-3 transition-transform duration-150 group-hover:translate-x-1"></x-heroicon-o-chevron-right>
							</li>
							@empty
							<p class="text-sm text-gray-400 text-center mt-4">Nessun Brand</p>
						@endforelse
					</ul>
				</div>
			</div>
			<div class="space-y-3">
				<x-input wire:model.debounce.500="search_added" type="text" name="search" placeholder="Cerca tra 'I più richiesti'.."></x-input>
				<div class="max-h-96 overflow-y-scroll">
					<x-laravel-blade-sortable::sortable wire:onSortOrderChange="sortOnlyOnsOrder" as="ul" role="list" class="space-y-3">
						@forelse($only_ons as $brand)
							<x-laravel-blade-sortable::sortable-item as="li" sort-key="{{ $brand->id }}" wire:click="remove({{ $brand->id }})" wire:key="our-{{ $brand->id }}" class="group flex items-center justify-between overflow-hidden border border-gray-200 rounded-md bg-white px-4 py-1.5 hover:cursor-pointer">
								<x-heroicon-o-chevron-left class="w-3 h-3 transition-transform duration-150 group-hover:-translate-x-1"></x-heroicon-o-chevron-left>
								<span class="text-xs font-semibold">{{ $brand->name }}</span>
								<div class="p-2 rounded-md hover:bg-gray-100 hover:cursor-pointer">
									<x-heroicon-o-bars-2 class="w-3 h-3 text-gray-400"></x-heroicon-o-bars-2>
								</div>
							</x-laravel-blade-sortable::sortable-item>
						@empty
							<p class="text-sm text-gray-400 text-center mt-4">Nessun Brand</p>
						@endforelse
					</x-laravel-blade-sortable::sortable>
				</div>
			</div>
		</div>
	</div>
</div>