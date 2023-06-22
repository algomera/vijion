<form wire:submit.prevent="save" class="p-4">
	<div class="space-y-10">
		<div>
			<h2 class="text-base font-semibold leading-7 text-gray-900">Modifica Slide</h2>

			<div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <x-input-label>Visibilità</x-input-label>
                    <div class="flex items-center space-x-3 mt-1">
                        @foreach(config('languages') as $code => $language)
                            @php($field = "slide.visible_{$code}")
                            <span wire:click="$toggle('{{ $field }}')"
                                  class="{{ $slide["visible_{$code}"] ? 'bg-green-200' : 'bg-red-200' }} text-gray-500 hover:text-gray-700 hover:cursor-pointer rounded-md px-2 py-2 text-sm font-medium">
                                            <x-dynamic-component component="flag-language-{{ $code }}" class="w-4 h-4"/>
                                        </span>
                        @endforeach
                    </div>
                </div>
				<div class="col-span-full">
					<x-input wire:model.debounce.500ms="slide.paragraph" type="text" name="paragraph"
					         label="Paragrafo"></x-input>
				</div>
				<div class="col-span-full sm:col-span-3">
					<x-input wire:model.debounce.500ms="slide.btn_text" type="text" name="btn_text"
					         label="Testo link"></x-input>
				</div>
				<div class="col-span-full sm:col-span-3">
					<x-input wire:model.debounce.500ms="slide.btn_url" type="text" name="btn_url"
					         label="URL link"></x-input>
				</div>
				<div class="col-span-full sm:col-span-2">
					<x-input wire:model.debounce.500ms="slide.small_centered_text" type="text" name="small_centered_text"
					         label="Testo centrale (piccolo)" hint="Esempio: sconti fino al"></x-input>
				</div>
				<div class="col-span-full sm:col-span-2">
					<x-input wire:model.debounce.500ms="slide.big_centered_text" type="text" name="big_centered_text"
					         label="Valore" hint="Esempio: 50%"></x-input>
				</div>
				<div class="col-span-full sm:col-span-2">
					<x-input wire:model.debounce.500ms="slide.coins_centered_text" type="text" name="coins_centered_text"
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
					@if($slide->background_url)
						<span wire:click="$set('slide.background_url', null)"
						      class="mt-1 text-sm font-semibold text-red-500 hover:cursor-pointer hover:underline">Rimuovi sfondo</span>
					@endif
				</div>
				<div class="col-span-full">
					<div class="border-t border-gray-200 pt-2 text-center">
						<h3 class="text-base font-bold leading-6 text-gray-900">Anteprima</h3>
					</div>
					<div class="flex flex-col sm:flex-row sm:items-start gap-4 mt-3">
						<div class="flex-1">
							<div class="aspect-video">
								<x-hero-slide-preview :paragraph="$slide->paragraph" :btn_text="$slide->btn_text" :btn_url="$slide->btn_url"
								                      :small_centered_text="$slide->small_centered_text"
								                      :big_centered_text="$slide->big_centered_text"
								                      :coins_centered_text="$slide->coins_centered_text"
								                      :background_url="$slide->background_url ?? $background_url?->temporaryUrl()"
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<x-primary-button>Salva</x-primary-button>
	</div>
</form>
