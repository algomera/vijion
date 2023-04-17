<div class="bg-white px-4 py-5 sm:px-6">
	<div class="flex items-center justify-between">
		<h3 class="flex items-center space-x-2 text-base font-semibold leading-6 text-gray-900">
			<span>Solo su Viji-Store</span>
			<span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-semibold text-gray-800">{{ $brands->count() }}</span>
		</h3>
		<span wire:click="$emit('openModal', 'admin.pages.settings.widget.only-on.edit-list')"
		      class="text-sm text-brand-purple hover:text-brand-purple-light hover:underline hover:cursor-pointer">Lista</span>
	</div>
</div>