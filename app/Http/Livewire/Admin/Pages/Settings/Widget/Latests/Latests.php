<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\Latests;

	use App\Models\Brand;
	use Livewire\Component;

	class Latests extends Component
	{
		protected $listeners = [
			'update-list' => '$refresh'
		];

		public function render() {
			$brands = Brand::where('latest', 1)->get();
			return view('livewire.admin.pages.settings.widget.latests.latests', [
				'brands' => $brands
			]);
		}
	}
