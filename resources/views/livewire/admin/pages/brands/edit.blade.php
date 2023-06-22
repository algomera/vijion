<form wire:submit.prevent="save" class="p-4">
    <div class="space-y-10">
        <div>
            <h2 class="text-base font-semibold leading-7 text-gray-900">Modifica Brand</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Modifica il Brand "{{ $brand->name }}"</p>

            <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <x-input-label>Visibilità</x-input-label>
                    <div class="flex items-center space-x-3 mt-1">
                        @foreach(config('languages') as $code => $language)
                            @php($field = "brand.visible_{$code}")
                            <span wire:click="$toggle('{{ $field }}')"
                                  class="{{ $brand["visible_{$code}"] ? 'bg-green-200' : 'bg-red-200' }} text-gray-500 hover:text-gray-700 hover:cursor-pointer rounded-md px-2 py-2 text-sm font-medium">
                                            <x-dynamic-component component="flag-language-{{ $code }}" class="w-4 h-4"/>
                                        </span>
                        @endforeach
                    </div>
                </div>
                <div class="col-span-full">
                    <x-input wire:model.defer="brand.name" type="text" name="name" label="Nome"></x-input>
                </div>
                <div class="col-span-full">
                    <x-select wire:model.defer="brand.category_id" name="brand.category_id" label="Categoria">
                        <option value="null" selected disabled>Seleziona</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="col-span-full">
                    <div class="flex items-center justify-between">
                        <x-input-label for="logo">Logo</x-input-label>
                        @if($brand->logo_path)
                            <label for="new_logo"
                                   class="relative cursor-pointer rounded-md bg-white font-semibold text-sm text-brand-purple focus-within:outline-none focus-within:ring-2 focus-within:ring-brand-purple focus-within:ring-offset-2 hover:text-brand-purple-light">
                                <span>Sostituisci</span>
                                <input wire:model.defer="new_logo" id="new_logo" name="new_logo" type="file"
                                       class="sr-only">
                            </label>
                        @endif
                    </div>
                    @if($new_logo)
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('new_logo') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
                            <img src="{{ $new_logo->temporaryUrl() }}" class="max-h-32 w-full object-contain">
                        </div>
                        <x-input-error :messages="$errors->get('new_logo')"></x-input-error>
                    @elseif($brand->logo_path)
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('brand.logo_path') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
                            <img src="{{ asset($brand->logo_path) }}" class="max-h-32 w-full object-contain">
                        </div>
                        <x-input-error :messages="$errors->get('brand.logo_path')"></x-input-error>
                    @endif
                </div>
                <div class="col-span-full">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center space-x-4">
                            <x-input-label>Regole</x-input-label>
                            <div>
                                <nav class="flex space-x-2">
                                    @foreach(config('languages') as $code => $language)
                                        <span wire:click="$set('lang', '{{ $code }}')"
                                              class="{{ $lang === $code ? 'bg-gray-100' : 'hover:bg-gray-50 hover:cursor-pointer' }} text-gray-500 hover:text-gray-700 rounded-md px-2 py-2 text-sm font-medium">
                                            <x-dynamic-component component="flag-language-{{ $code }}" class="w-4 h-4"/>
                                        </span>
                                    @endforeach
                                </nav>
                            </div>
                        </div>
                        <span wire:click="addBrandRule"
                              class="text-sm font-medium text-brand-purple hover:text-brand-purple-light hover:cursor-pointer">Aggiungi</span>
                    </div>
                    @if($lang === 'it')
                        <x-laravel-blade-sortable::sortable
                            wire:key="it-brand-rules"
                            wire:onSortOrderChange="sortBrandRulesOrder"
                            class="space-y-2">
                            @foreach($brand_rules as $k => $rule)
                                <x-laravel-blade-sortable::sortable-item sort-key="{{ $rule->id }}"
                                                                         wire:key="it-rule-{{$brand->id}}-{{$rule->id}}">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="p-2 rounded-md hover:bg-gray-100 hover:cursor-pointer @error('brand_rules.' . $k . '.body_it') transform -translate-y-[0.8rem] @enderror">
                                            <x-heroicon-o-bars-2 class="w-4 h-4 text-gray-400"></x-heroicon-o-bars-2>
                                        </div>
                                        <div class="w-full">
                                            <x-input wire:model.defer="brand_rules.{{$k}}.body_it" type="text"
                                                     class="flex-1"></x-input>
                                        </div>
                                        <div wire:click="removeBrandRule({{$k}})"
                                             class="p-2 rounded-md hover:bg-red-100 hover:cursor-pointer @error('brand_rules.' . $k . '.body_it') transform -translate-y-[0.8rem] @enderror">
                                            <x-heroicon-o-trash class="w-4 h-4 text-red-500"></x-heroicon-o-trash>
                                        </div>
                                    </div>
                                </x-laravel-blade-sortable::sortable-item>
                            @endforeach
                        </x-laravel-blade-sortable::sortable>
                    @endif
                    @if($lang === 'en')
                        <x-laravel-blade-sortable::sortable
                            wire:key="en-brand-rules"
                            wire:onSortOrderChange="sortBrandRulesOrder"
                            class="space-y-2">
                            @foreach($brand_rules as $k => $rule)
                                <x-laravel-blade-sortable::sortable-item sort-key="{{ $rule->id }}"
                                                                         wire:key="en-rule-{{$brand->id}}-{{$rule->id}}">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="p-2 rounded-md hover:bg-gray-100 hover:cursor-pointer @error('brand_rules.' . $k . '.body_en') transform -translate-y-[0.8rem] @enderror">
                                            <x-heroicon-o-bars-2 class="w-4 h-4 text-gray-400"></x-heroicon-o-bars-2>
                                        </div>
                                        <div class="w-full">
                                            <x-input wire:model.defer="brand_rules.{{$k}}.body_en" type="text"
                                                     class="flex-1"></x-input>
                                        </div>
                                        <div wire:click="removeBrandRule({{$k}})"
                                             class="p-2 rounded-md hover:bg-red-100 hover:cursor-pointer @error('brand_rules.' . $k . '.body_en') transform -translate-y-[0.8rem] @enderror">
                                            <x-heroicon-o-trash class="w-4 h-4 text-red-500"></x-heroicon-o-trash>
                                        </div>
                                    </div>
                                </x-laravel-blade-sortable::sortable-item>
                            @endforeach
                        </x-laravel-blade-sortable::sortable>
                    @endif
                </div>
            </div>
        </div>
        <x-primary-button>Salva</x-primary-button>
    </div>
</form>
