<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\MostPopulars;

	use App\Models\Brand;
	use Livewire\Component;

	class MostPopulars extends Component
	{
		protected $listeners = [
			'update-list' => '$refresh'
		];

		public function render() {
			$brands = Brand::where('most_popular', 1)->get();
			return view('livewire.admin.pages.settings.widget.most-populars.most-populars', [
				'brands' => $brands
			]);
		}
	}
