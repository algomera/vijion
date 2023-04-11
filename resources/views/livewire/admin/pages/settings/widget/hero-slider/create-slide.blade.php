<form wire:submit.prevent="create" class="p-4">
	<div class="space-y-10">
		<div>
			<h2 class="text-base font-semibold leading-7 text-gray-900">Nuova Slide</h2>
			<p class="mt-1 text-sm leading-6 text-gray-600">Inserisci le informazioni necessarie per creare una nuova
				Slide</p>

			<div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
				<div class="col-span-full">
					<x-input wire:model.debounce.500ms="paragraph" type="text" name="parahraph"
					         label="Paragrafo"></x-input>
				</div>
				<div class="col-span-full sm:col-span-3">
					<x-input wire:model.debounce.500ms="btn_text" type="text" name="btn_text"
					         label="Testo link"></x-input>
				</div>
				<div class="col-span-full sm:col-span-3">
					<x-input wire:model.debounce.500ms="btn_url" type="text" name="btn_url"
					         label="URL link"></x-input>
				</div>
				<div class="col-span-full sm:col-span-2">
					<x-input wire:model.debounce.500ms="small_centered_text" type="text" name="small_centered_text"
					         label="Testo centrale (piccolo)" hint="Esempio: sconti fino al"></x-input>
				</div>
				<div class="col-span-full sm:col-span-2">
					<x-input wire:model.debounce.500ms="big_centered_text" type="text" name="big_centered_text"
					         label="Valore" hint="Esempio: 50%"></x-input>
				</div>
				<div class="col-span-full sm:col-span-2">
					<x-input wire:model.debounce.500ms="coins_centered_text" type="text" name="coins_centered_text"
					         label="VIJI-COINS"></x-input>
				</div>
				<div class="col-span-full flex items-center justify-between">
					<label class="block">
						<span class="sr-only">Choose a background image</span>
						<input wire:model="background_url" type="file" class="block w-full text-sm text-slate-500
					      file:mr-4 file:py-2 file:px-4
					      file:rounded-full file:border-0
					      file:text-sm file:font-semibold
					      file:bg-violet-50 file:text-violet-700
					      hover:file:bg-violet-100
					    "/>
					</label>
					@if($background_url)
						<span wire:click="$set('background_url', null)"
						      class="mt-1 text-sm font-semibold text-red-500 hover:cursor-pointer hover:underline">Rimuovi sfondo</span>
					@endif
				</div>
				<div class="col-span-full">
					<div class="border-t border-gray-200 pt-2 text-center">
						<h3 class="text-base font-bold leading-6 text-gray-900">Anteprima</h3>
					</div>
					{{-- TODO: Fix background_url->temporaryUrl() --}}
					<div class="flex flex-col sm:flex-row sm:items-start gap-4 mt-3">
						<div class="flex-1">
							<div class="aspect-video">
								<x-hero-slide-preview :paragraph="$paragraph" :btn_text="$btn_text" :btn_url="$btn_url"
								                      :small_centered_text="$small_centered_text"
								                      :big_centered_text="$big_centered_text"
								                      :coins_centered_text="$coins_centered_text"
								                      :background_url="$background_url ? $background_url->temporaryUrl() : null"
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<x-primary-button>Crea</x-primary-button>
	</div>
</form>