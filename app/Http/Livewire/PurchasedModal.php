<?php

	namespace App\Http\Livewire;

	use LivewireUI\Modal\ModalComponent;

	class PurchasedModal extends ModalComponent
	{
		public function render() {
			return view('livewire.purchased-modal');
		}
	}