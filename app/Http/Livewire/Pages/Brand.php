<?php

	namespace App\Http\Livewire\Pages;

	use Livewire\Component;

	class Brand extends Component
	{
		public \App\Models\Brand $brand;

		public function mount() {
			if($this->brand->coupons()->available()->count() === 1) {
				return redirect()->route('coupon', $this->brand->coupons()->available()->first());
			}
		}

		public function render() {
			return view('livewire.pages.brand', [
				'coupons' => $this->brand->coupons()->available()->get()
			])->layout('layouts.guest');
		}
	}
