<div class="p-4">
	<div class="flex justify-end">
		<x-icon wire:click="$emit('closeModal')" name="close"
		        class="w-8 h-8 text-gray-300 cursor-pointer hover:text-gray-500"></x-icon>
	</div>
	<div class="flex flex-col items-center space-y-7">
		<div class="text-center">
			<x-icon name="check-circle" class="w-28 h-28 text-green-400"></x-icon>
		</div>
		<div class="text-center">
			<p>Il tuo acquisto è stato completato correttamente. A breve riceverai una email con lo sconto da te selezionato!</p>
		</div>
		<button type="submit"
		        class="w-full rounded-md bg-brand py-4 px-6 text-xs font-semibold text-white uppercase transition duration-300 hover:bg-brand-light focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#63184c] disabled:bg-gray-200">
			Visualizza portafoglio
		</button>
	</div>
</div>
