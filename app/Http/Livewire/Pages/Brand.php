<?php

	namespace App\Http\Livewire\Pages;

	use Livewire\Component;

	class Brand extends Component
	{
		public \App\Models\Brand $brand;

		public function render() {
			return view('livewire.pages.brand', [
				'coupons' => $this->brand->coupons()->available()->get()
			])->layout('layouts.guest');
		}
	}
