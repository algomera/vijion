<form wire:submit.prevent="save" class="p-4">
    <div class="space-y-10">
        <div>
            <h2 class="text-base font-semibold leading-7 text-gray-900">Modifica Categoria</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Modifica la categoria "{{ $category->name }}"</p>

            <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <div class="flex items-center space-x-4 mb-3">
                        <x-input-label>Nome</x-input-label>
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
                    @if($lang === 'it')
                        <x-input wire:model.defer="category.name_it" type="text" name="name"></x-input>
                    @endif
                    @if($lang === 'en')
                        <x-input wire:model.defer="category.name_en" type="text" name="name"></x-input>
                    @endif
                </div>
                <div class="col-span-full">
                    <div class="flex items-center justify-between">
                        <x-input-label for="category.image_path">Immagine</x-input-label>
                        @if($category->image_path)
                            <label for="new_image"
                                   class="relative cursor-pointer rounded-md bg-white font-semibold text-sm text-brand-purple focus-within:outline-none focus-within:ring-2 focus-within:ring-brand-purple focus-within:ring-offset-2 hover:text-brand-purple-light">
                                <span>Sostituisci</span>
                                <input wire:model.defer="new_image" id="new_image" name="new_image" type="file"
                                       class="sr-only">
                            </label>
                        @endif
                    </div>
                    @if($new_image)
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('new_image') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
                            <img src="{{ $new_image->temporaryUrl() }}">
                        </div>
                        <x-input-error :messages="$errors->get('new_image')"></x-input-error>
                    @elseif($category->image_path)
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('category.image_path') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
                            <img src="{{ asset($category->image_path) }}">
                        </div>
                        <x-input-error :messages="$errors->get('category.image_path')"></x-input-error>
                    @endif
                </div>
            </div>
        </div>
        <x-primary-button>Salva</x-primary-button>
    </div>
</form>
