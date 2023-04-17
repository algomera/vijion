<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\OnlyOn;

	use App\Models\Brand;
	use Livewire\Component;

	class OnlyOn extends Component
	{
		protected $listeners = [
			'update-list' => '$refresh'
		];

		public function render() {
			$brands = Brand::where('only_on', 1)->get();
			return view('livewire.admin.pages.settings.widget.only-on.only-on', [
				'brands' => $brands
			]);
		}
	}
