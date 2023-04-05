<form wire:submit.prevent="save" class="p-4">
	<div class="space-y-10">
		<div>
			<h2 class="text-base font-semibold leading-7 text-gray-900">Assegna VIJI-COINS</h2>
			<p class="mt-1 text-sm leading-6 text-gray-600">Assegna VIJI-COINS al video "{{ $video->title }}"</p>

			<div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
				<div class="col-span-full">
					<x-input wire:model.defer="video.coins" type="number" name="coins" label="VIJI-COINS"></x-input>
				</div>
			</div>
		</div>
		<x-primary-button>Salva</x-primary-button>
	</div>
</form>