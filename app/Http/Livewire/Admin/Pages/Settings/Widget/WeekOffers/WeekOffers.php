<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\WeekOffers;

	use App\Models\Brand;
	use Livewire\Component;

	class WeekOffers extends Component
	{
		public function render() {
			$brands = Brand::where('week_offer', 1)->get();
			return view('livewire.admin.pages.settings.widget.week-offers.week-offers', [
				'brands' => $brands
			]);
		}
	}
