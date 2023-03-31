<?php

	namespace App\Http\Livewire;

	use LivewireUI\Modal\ModalComponent;

	class PurchasedModal extends ModalComponent
	{
		public static function modalMaxWidth(): string
		{
			return 'md';
		}

		public function goToPortafoglio() {
			return redirect()->route('wallet');
		}
		public function render() {
			return view('livewire.purchased-modal');
		}
	}
