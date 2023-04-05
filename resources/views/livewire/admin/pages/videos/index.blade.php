<div>
	<x-header>
		<x-slot:title>Video</x-slot:title>
	</x-header>
	<div class="overflow-hidden bg-white shadow sm:rounded-md">
		<div class="p-4 sm:p-6 lg:p-8">
			<div class="sm:flex sm:items-center sm:justify-between">
				<div class="sm:flex-auto max-w-2xl">
					<x-input type="text" wire:model.debouce.500ms="search" wire:keydown.escape="$set('search', '')"
					         placeholder="Cerca.."></x-input>
				</div>
				<div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
					<x-primary-button wire:click="sync">
						<div wire:loading.inline-flex wire:target="sync" class="flex items-center">
							<svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
							     fill="none" viewBox="0 0 24 24">
								<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
								        stroke-width="4"></circle>
								<path class="opacity-75" fill="currentColor"
								      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
							</svg>
							<span>Aggiornamento..</span>
						</div>
						<span wire:loading.remove wire:target="sync">Aggiorna Lista</span>
					</x-primary-button>
				</div>
			</div>
		</div>
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($videos as $video)
				<li wire:click="$emit('openModal', 'admin.pages.videos.edit', {{ json_encode(['video' => $video->id]) }})"
				    wire:key="{{ $video->id }}">
					<div class="block hover:bg-gray-50 hover:cursor-pointer">
						<div class="flex items-center px-4 py-4 sm:px-6">
							<div class="flex min-w-0 flex-1 items-center">
								<div class="flex-shrink-0">
									@if($video->img_preview)
										<img class="w-24 aspect-video" src="{{ $video->img_preview }}"
										     alt="">
									@else
										<div class="w-24 bg-gray-400 aspect-video"></div>
									@endif
								</div>
								<div class="min-w-0 flex-1 px-8 md:grid md:grid-cols-2 md:gap-4">
									<div class="flex flex-col justify-center">
										<p class="truncate text-sm font-bold text-gray-800">{{ $video->title }}</p>
										<p class="text-xs text-gray-500">Teyuto ID: <span
													class="font-bold">{{ $video->teyuto_id }}</span></p>
									</div>
									<div>
										<p class="mt-2 flex items-center text-sm text-brand">
											<x-heroicon-o-play-circle
													class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-play-circle>
											VIJI-COINS: {{ $video->coins }}/min
										</p>
										<p class="mt-2 flex items-center text-sm text-gray-500">
											<x-heroicon-o-clock
													class="mr-1.5 h-5 w-5 flex-shrink-0"></x-heroicon-o-clock>
											Durata: {{ $video->duration ?: '-' }}
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
					</div>
				</li>
			@empty
				<p class="w-full max-w-0 py-8 pl-4 pr-3 text-sm font-medium text-gray-400 text-center sm:w-auto sm:max-w-none sm:pl-3">
					Nessun video trovato.
				</p>
			@endforelse
		</ul>
	</div>
	<div class="mt-5">
		{{ $videos->links() }}
	</div>
</div>
