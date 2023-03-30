<?php

	namespace App\Http\Livewire\Pages;

	use Livewire\Component;

	class Coupon extends Component
	{
		public \App\Models\Coupon $coupon;

		public function render() {
			return view('livewire.pages.coupon')->layout('layouts.guest');
		}
	}
