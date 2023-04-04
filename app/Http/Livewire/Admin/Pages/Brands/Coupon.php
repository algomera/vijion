<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use Livewire\Component;

	class Coupon extends Component
	{
		public \App\Models\Coupon $coupon;
		public function render() {
			return view('livewire.admin.pages.brands.coupon');
		}
	}
