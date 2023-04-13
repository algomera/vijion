<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\OurBrands;

	use App\Models\Brand;
	use Livewire\Component;

	class OurBrands extends Component
	{
		public function render() {
			$brands = Brand::where('our_brand', 1)->get();
			return view('livewire.admin.pages.settings.widget.our-brands.our-brands', [
				'brands' => $brands
			]);
		}
	}
