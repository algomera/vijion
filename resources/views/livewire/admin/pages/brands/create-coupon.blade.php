<form wire:submit.prevent="create" class="p-4">
	<div class="space-y-10">
		<div>
			<h2 class="text-base font-semibold leading-7 text-gray-900">Nuovo Coupon</h2>
			<p class="mt-1 text-sm leading-6 text-gray-600">Inserisci le informazioni necessarie per creare un nuovo
				Coupon per "{{ $brand->name }}"</p>

			<div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
				<div class="col-span-full sm:col-span-3">
					<x-input wire:model.debounce.500ms="amount" type="number" name="amount" label="Valore"></x-input>
				</div>
				<div class="col-span-full sm:col-span-3">
					<x-input wire:model.debounce.500ms="coins" type="number" step="1" name="coins" label="VIJI-COINS"></x-input>
				</div>
				<div class="col-span-full sm:col-span-3">
					<x-input wire:model.debounce.500ms="expires_date" type="date" name="expires_date"
					         min="{{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}"
					         label="Data di scadenza"></x-input>
				</div>
				<div class="col-span-full sm:col-span-3">
					<x-select wire:model.debounce.500ms="type" name="type" label="Tipologia di sconto">
						<option value="null" selected disabled>Seleziona</option>
						<option value="percentage">Percentuale</option>
						<option value="cash">In Euro</option>
					</x-select>
				</div>
				<div class="col-span-full sm:col-span-3">
					<x-input-label for="text_color">Colore</x-input-label>
					<fieldset class="mt-2">
						<div class="flex items-center space-x-3">
							<label wire:click="$set('text_color', 'text-white')"
							       class="{{ $text_color === 'text-white' ? 'ring ring-offset-1' : '' }} relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-brand-light">
								<input type="radio" name="color-choice" value="White" class="sr-only"
								       aria-labelledby="color-choice-0-label">
								<span id="color-choice-0-label" class="sr-only"> White </span>
								<span aria-hidden="true"
								      class="h-8 w-8 bg-white rounded-full border border-black border-opacity-10"></span>
							</label>
							<label wire:click="$set('text_color', 'text-gray-800')"
							       class="{{ $text_color === 'text-gray-800' ? 'ring ring-offset-1' : '' }} relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-brand-light">
								<input type="radio" name="color-choice" value="White" class="sr-only"
								       aria-labelledby="color-choice-0-label">
								<span id="color-choice-0-label" class="sr-only"> White </span>
								<span aria-hidden="true"
								      class="h-8 w-8 bg-gray-800 rounded-full border border-black border-opacity-10"></span>
							</label>
						</div>
					</fieldset>
				</div>
				<div class="col-span-full sm:col-span-3 flex items-center justify-between">
					<label class="block">
						<span class="sr-only">Choose profile photo</span>
						<input wire:model="bg" type="file" class="block w-full text-sm text-slate-500
					      file:mr-4 file:py-2 file:px-4
					      file:rounded-full file:border-0
					      file:text-sm file:font-semibold
					      file:bg-violet-50 file:text-violet-700
					      hover:file:bg-violet-100
					    "/>
					</label>
					@if($bg)
						<span wire:click="$set('bg', null)"
						      class="mt-1 text-sm font-semibold text-red-500 hover:cursor-pointer hover:underline">Rimuovi sfondo</span>
					@endif
				</div>
				<div class="col-span-full">
					<div class="border-t border-gray-200 pt-2 text-center">
						<h3 class="text-base font-bold leading-6 text-gray-900">Anteprime</h3>
					</div>
					<div class="flex flex-col sm:flex-row sm:items-start gap-4 mt-3">
						<div class="flex-1">
							<x-input-label class="mb-1">Card Highlight</x-input-label>
							<x-coupon-card-highlight-preview :brand="$brand"
							                                 :bg="$bg ? $bg->temporaryUrl() : $brand->category->image_path"
							                                 :text_color="$text_color" :amount="$amount ?? 0"
							                                 :coins="$coins ?? 0"
							                                 :type="$type" :expires_date="$expires_date"/>
						</div>
						<div class="flex-1">
							<x-input-label class="mb-1">Card</x-input-label>
							<div class="aspect-video">
								<x-coupon-card-preview :brand="$brand" :amount="$amount ?? 0" :coins="$coins ?? 0"
								                       :type="$type"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<x-primary-button>Crea</x-primary-button>
	</div>
</form>