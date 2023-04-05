<form wire:submit.prevent="save" class="p-4">
	<div class="space-y-10">
		<div class="border-b border-gray-900/10 pb-12">
			<h2 class="text-base font-semibold leading-7 text-gray-900">Modifica Brand</h2>
			<p class="mt-1 text-sm leading-6 text-gray-600">Modifica il Brand "{{ $brand->name }}"</p>

			<div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
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
								<input wire:model="new_logo" id="new_logo" name="new_logo" type="file"
								       class="sr-only">
							</label>
						@endif
					</div>
					@if($new_logo)
						<div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('new_logo') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
							<img src="{{ $new_logo->temporaryUrl() }}">
						</div>
						<x-input-error :messages="$errors->get('new_logo')"></x-input-error>
					@elseif($brand->logo_path)
						<div class="mt-2 flex justify-center rounded-lg border border-dashed {{ $errors->has('brand.logo_path') ? 'border-red-500' : 'border-gray-900/25' }} p-2">
							<img src="{{ asset($brand->logo_path) }}">
						</div>
						<x-input-error :messages="$errors->get('brand.logo_path')"></x-input-error>
					@endif
				</div>
			</div>
		</div>
		<x-primary-button>Salva</x-primary-button>
	</div>
</form>