<div class="bg-white px-4 py-5 sm:px-6">
	<div class="flex items-center justify-between">
		<h3 class="text-base font-semibold leading-6 text-gray-900">Categorie in evidenza</h3>
		<span wire:click="$emit('openModal', 'admin.pages.settings.widget.highlighted-categories.show-preview')"
		      class="text-sm text-brand-purple hover:text-brand-purple-light hover:underline hover:cursor-pointer">Visualizza Anteprima</span>
	</div>
	<section class="my-8">
		<div class="my-5 grid grid-cols-2 gap-8">
			<x-select wire:model="category_1" name="category_1" label="Prima categoria (1/2)">
				<option value="" selected>Nessuna</option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</x-select>
			<x-select wire:model="category_2" name="category_2" label="Seconda categoria (1/2)">
				<option value="" selected>Nessuna</option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</x-select>
			<div class="col-span-2">
				<x-select wire:model="category_3" name="category_3" label="Terza categoria (2/2)">
					<x-slot:action>
						@if($selected_category_3)
							<span wire:click="$emit('openModal', 'admin.pages.settings.widget.highlighted-categories.edit-category3', {{ json_encode(['category' => $selected_category_3]) }})"
							      class="text-sm text-brand-purple hover:text-brand-purple-light hover:underline hover:cursor-pointer">Modifica</span>
						@endif
					</x-slot:action>
					<option value="" selected>Nessuna</option>
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</x-select>
			</div>
		</div>
	</section>
</div>