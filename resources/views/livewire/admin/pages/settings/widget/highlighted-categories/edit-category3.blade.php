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
			</div>
		</div>
		<x-primary-button>Salva</x-primary-button>
	</div>
</form>