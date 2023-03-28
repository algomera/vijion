<?php

	namespace App\Http\Livewire\Pages;

	use Livewire\Component;

	class Cart extends Component
	{
		public function buy() {
			$this->emit('openModal', 'purchased-modal');
		}
		public function render() {
			return view('livewire.pages.cart')->layout('layouts.guest');
		}
	}
