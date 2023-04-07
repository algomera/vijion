<form wire:submit.prevent="create" class="p-4">
    <div class="space-y-10">
        <div>
            <h2 class="text-base font-semibold leading-7 text-gray-900">Nuovo Brand</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Inserisci le informazioni necessarie per creare un nuovo Brand</p>

            <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <x-input wire:model.defer="name" type="text" name="name" label="Nome"></x-input>
                </div>
                <div class="col-span-full">
                    <x-select wire:model.defer="category" name="category" label="Categoria">
                        <option value="null" selected disabled>Seleziona</option>
                        @foreach($categories as $category)
		                    <option value="{{ $category->id }}">{{ $category->name }}</option>
	                    @endforeach
                    </x-select>
                </div>
	            <div class="col-span-full">
		            <div class="flex items-center justify-between">
			            <x-input-label for="logo">Logo</x-input-label>
			            @if($logo)
				            <span wire:click="$set('logo', null)"
				                  class="text-sm font-semibold text-red-500 hover:cursor-pointer hover:underline">Elimina</span>
			            @endif
		            </div>
		            @if(!$logo)
			            <div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('logo') ? 'border-red-500' : 'border-gray-900/25' }} px-6 py-4">
				            <div class="text-center">
					            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
					                 aria-hidden="true">
						            <path fill-rule="evenodd"
						                  d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
						                  clip-rule="evenodd"/>
					            </svg>
					            <div class="mt-4 flex text-sm leading-6 text-gray-600">
						            <label for="logo"
						                   class="mx-auto relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
							            <span>Carica un logo</span>
							            <input wire:model.defer="logo" id="logo" name="logo" type="file"
							                   class="sr-only">
						            </label>
					            </div>
					            <p class="text-xs leading-5 text-gray-600">PNG, JPG fino a 10MB</p>
				            </div>
			            </div>
			            <x-input-error :messages="$errors->get('logo')"></x-input-error>
		            @else
			            <div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('logo') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
				            <img src="{{ $logo->temporaryUrl() }}" class="max-h-32 w-full object-contain">
			            </div>
			            <x-input-error :messages="$errors->get('logo')"></x-input-error>
		            @endif
	            </div>
	            <div class="col-span-full">
		            <div class="flex items-center justify-between">
			            <x-input-label>Regole</x-input-label>
			            <span wire:click="addBrandRule"
			                  class="text-sm font-medium text-brand-purple hover:text-brand-purple-light hover:cursor-pointer">Aggiungi</span>
		            </div>
		            <x-laravel-blade-sortable::sortable
				            wire:onSortOrderChange="sortBrandRulesOrder"
				            class="space-y-2 mt-3">
			            @foreach($brand_rules as $k => $rule)
				            <x-laravel-blade-sortable::sortable-item sort-key="{{ $k }}" wire:key="{{$k}}">
					            <div class="flex items-center space-x-3">
						            <div class="p-2 rounded-md hover:bg-gray-100 hover:cursor-pointer @error('brand_rules.' . $k . '.body') transform -translate-y-[0.8rem] @enderror">
							            <x-heroicon-o-bars-2 class="w-4 h-4 text-gray-400"></x-heroicon-o-bars-2>
						            </div>
						            <div class="w-full">
							            <x-input wire:model.defer="brand_rules.{{$k}}.body" type="text"
							                     class="flex-1"></x-input>
						            </div>
						            <div wire:click="removeBrandRule({{$k}})"
						                 class="p-2 rounded-md hover:bg-red-100 hover:cursor-pointer @error('brand_rules.' . $k . '.body') transform -translate-y-[0.8rem] @enderror">
							            <x-heroicon-o-trash class="w-4 h-4 text-red-500"></x-heroicon-o-trash>
						            </div>
					            </div>
				            </x-laravel-blade-sortable::sortable-item>
			            @endforeach
		            </x-laravel-blade-sortable::sortable>
	            </div>
            </div>
        </div>
        <x-primary-button>Crea</x-primary-button>
    </div>
</form>