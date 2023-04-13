<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\Unmissables;

	use App\Models\Brand;
	use Livewire\Component;

	class Unmissables extends Component
	{
		protected $listeners = [
			'update-list' => '$refresh'
		];

		public function render() {
			$brands = Brand::where('unmissable', 1)->get();
			return view('livewire.admin.pages.settings.widget.unmissables.unmissables', [
				'brands' => $brands
			]);
		}
	}
