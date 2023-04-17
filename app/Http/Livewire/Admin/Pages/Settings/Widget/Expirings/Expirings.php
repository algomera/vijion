<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\Expirings;

	use App\Models\Brand;
	use Livewire\Component;

	class Expirings extends Component
	{
		protected $listeners = [
			'update-list' => '$refresh'
		];

		public function render() {
			$brands = Brand::where('expiring', 1)->get();
			return view('livewire.admin.pages.settings.widget.expirings.expirings', [
				'brands' => $brands
			]);
		}
	}
