<form wire:submit.prevent="create" class="p-4">
	<div class="space-y-10">
		<div class="border-b border-gray-900/10 pb-12">
			<h2 class="text-base font-semibold leading-7 text-gray-900">Nuova Categoria</h2>
			<p class="mt-1 text-sm leading-6 text-gray-600">Inserisci le informazioni necessarie per creare una nuova Categoria</p>

			<div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
				<div class="col-span-full">
					<x-input wire:model="name" type="text" name="name" label="Nome"></x-input>
				</div>
				<div class="col-span-full">
					<div class="flex items-center justify-between">
						<x-input-label for="image">Immagine</x-input-label>
						@if($image)
							<span wire:click="$set('image', null)" class="text-sm font-semibold text-red-500 hover:cursor-pointer hover:underline">Elimina</span>
						@endif
					</div>
					@if(!$image)
						<div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('image') ? 'border-red-500' : 'border-gray-900/25' }} px-6 py-10">
							<div class="text-center">
								<svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
								</svg>
								<div class="mt-4 flex text-sm leading-6 text-gray-600">
									<label for="image" class="mx-auto relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
										<span>Carica un'immagine</span>
										<input wire:model="image" id="image" name="image" type="file" class="sr-only">
									</label>
								</div>
								<p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG fino a 10MB</p>
							</div>
						</div>
						<x-input-error :messages="$errors->get('image')"></x-input-error>
					@else
						<div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('image') ? 'border-red-500' : 'border-gray-900/25' }} px-6 py-10">
							<img src="{{ $image->temporaryUrl() }}">
						</div>
					@endif
				</div>
			</div>
		</div>
		<x-primary-button>Crea</x-primary-button>
	</div>
</form>