<div class="bg-white px-4 py-5 sm:px-6">
	<div class="flex items-center justify-between">
		<h3 class="text-base font-semibold leading-6 text-gray-900">Hero Slider</h3>
		<span wire:click="$emit('openModal', 'admin.pages.settings.widget.hero-slider.create-slide')" class="text-sm text-brand-purple font-semibold hover:text-brand-purple-light hover:cursor-pointer hover:underline">Aggiungi</span>
	</div>
	<x-laravel-blade-sortable::sortable
			wire:onSortOrderChange="sortHeroSlidesOrder"
			class="mt-6 divide-y divide-gray-100">
		@forelse($slides as $slide)
			<x-laravel-blade-sortable::sortable-item sort-key="{{ $slide->id }}" wire:key="{{$slide->id}}">
				<div class="bg-white flex items-center justify-between py-3">
					<div class="flex flex-col items-center space-y-3 pr-4 text-gray-400">
						<div class="p-2 rounded-md hover:bg-gray-100 hover:cursor-pointer">
							<x-heroicon-o-bars-2 class="w-4 h-4 text-gray-400"></x-heroicon-o-bars-2>
						</div>
					</div>
					<div class="flex flex-grow flex-col">
						<p class="text-sm font-medium leading-6 text-gray-900">{{ $slide->paragraph }}</p>
						<div class="flex space-x-2">
							<div class="mt-2 flex items-center text-sm text-gray-400">
								<x-heroicon-o-tag class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-tag>
								{{ $slide->small_centered_text }} {{ $slide->big_centered_text }}
							</div>
							<div class="mt-2 flex items-center text-sm text-gray-400">
								&dash;
							</div>
							<div class="mt-2 flex items-center text-sm text-brand">
								<x-heroicon-o-play-circle
										class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-play-circle>
								{{ $slide->coins_centered_text }}
							</div>
						</div>
						<div class="flex items-center space-x-2 mt-3">
							<div wire:click="$emit('openModal', 'admin.pages.settings.widget.hero-slider.show-slide', {{ json_encode(['slide' => $slide->id]) }})" class="flex items-center justify-center rounded-md p-2 text-blue-500 hover:bg-blue-50 hover:cursor-pointer">
								<x-heroicon-o-eye class="w-4 h-4"></x-heroicon-o-eye>
							</div>
                            <div wire:click="$emit('openModal', 'admin.pages.settings.widget.hero-slider.edit-slide', {{ json_encode(['slide' => $slide->id]) }})" class="flex items-center justify-center rounded-md p-2 text-blue-500 hover:bg-blue-50 hover:cursor-pointer">
                                <x-heroicon-o-pencil class="w-4 h-4"></x-heroicon-o-pencil>
                            </div>
						</div>
					</div>
                    <div wire:click="removeSlide({{ $slide->id }})" class="flex items-center justify-center rounded-md p-2 text-red-500 hover:bg-red-50 hover:cursor-pointer">
                        <x-heroicon-o-trash class="w-4 h-4"></x-heroicon-o-trash>
                    </div>
				</div>
			</x-laravel-blade-sortable::sortable-item>
		@empty
			<p class="text-sm text-gray-500">Nessuna Slide presente. <span wire:click="$emit('openModal', 'admin.pages.settings.widget.hero-slider.create-slide')" class="text-brand-purple hover:text-brand-purple-light hover:underline hover:cursor-pointer">Creala ora</span>.</p>
		@endforelse
	</x-laravel-blade-sortable::sortable>
</div>
