<form wire:submit.prevent="save" class="p-4">
	<div class="space-y-10">
		<div>
			<h2 class="text-base font-semibold leading-7 text-gray-900">Modifica</h2>
			<p class="mt-1 text-sm leading-6 text-gray-600">Modifica titolo e sottotitolo per la categoria "{{ $category->name }}"</p>

			<div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
				<div class="col-span-full">
					<x-input wire:model.debounce.500ms="category.highlighted_title" type="text" name="title"
					         label="Titolo"></x-input>
				</div>
				<div class="col-span-full">
					<x-input wire:model.debounce.500ms="category.highlighted_subtitle" type="text" name="subtitle"
					         label="Sottotitolo"></x-input>
				</div>

				@if(!$category->highlighted_background)
				<div class="col-span-full">
					<div class="flex items-center justify-between">
						<x-input-label for="new_image">Immagine</x-input-label>
						@if($new_image)
							<span wire:click="$set('new_image', null)" class="text-sm font-semibold text-red-500 hover:cursor-pointer hover:underline">Elimina</span>
						@endif
					</div>
					@if(!$new_image)
						<div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('new_image') ? 'border-red-500' : 'border-gray-900/25' }} px-6 py-10">
							<div class="text-center">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<div class="mt-4 flex text-sm leading-6 text-gray-600">
									<label for="new_image" class="mx-auto relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
										<span>Carica un'immagine</span>
										<input wire:model.defer="new_image" id="new_image" name="new_image" type="file" class="sr-only">
									</label>
								</div>
								<p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG fino a 10MB</p>
							</div>
						</div>
						<x-input-error :messages="$errors->get('new_image')"></x-input-error>
					@else
						<div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('new_image') ? 'border-red-500' : 'border-gray-900/25' }} px-6 py-10">
							<img src="{{ $new_image->temporaryUrl() }}">
						</div>
					@endif
				</div>
				@else
					<div class="col-span-full">
						<div class="flex items-center justify-between">
							<x-input-label for="category.highlighted_background">Immagine</x-input-label>
							<label for="new_image"
							       class="relative cursor-pointer rounded-md bg-white font-semibold text-sm text-brand-purple focus-within:outline-none focus-within:ring-2 focus-within:ring-brand-purple focus-within:ring-offset-2 hover:text-brand-purple-light">
								<span>Sostituisci</span>
								<input wire:model.defer="new_image" id="new_image" name="new_image" type="file"
								       class="sr-only">
							</label>
						</div>
						@if($new_image)
							<div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('new_image') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
								<img src="{{ $new_image->temporaryUrl() }}">
							</div>
							<x-input-error :messages="$errors->get('new_image')"></x-input-error>
						@elseif($category->highlighted_background)
							<div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('category.highlighted_background') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
								<img src="{{ asset($category->highlighted_background) }}">
							</div>
							<x-input-error :messages="$errors->get('category.highlighted_background')"></x-input-error>
						@endif
					</div>
				@endif
			</div>
		</div>
		<x-primary-button>Salva</x-primary-button>
	</div>
</form>