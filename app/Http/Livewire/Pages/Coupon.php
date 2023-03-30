<?php

	namespace App\Http\Livewire\Pages;

	use Livewire\Component;

	class Coupon extends Component
	{
		public function render() {
			return view('livewire.pages.coupon')->layout('layouts.guest');
		}
	}
