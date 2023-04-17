<?php

	namespace App\Http\Livewire\Pages;

	use App\Models\Brand;
	use Livewire\Component;
	use Livewire\WithPagination;

	class Brands extends Component
	{
		use WithPagination;

		public function render() {
			return view('livewire.pages.brands', [
				'brands' => Brand::whereHas('coupons', function ($coupons) {
					$coupons->available();
				})->orderByRaw('-our_brand_order DESC')->paginate(25)
			])->layout('layouts.guest');
		}
	}
