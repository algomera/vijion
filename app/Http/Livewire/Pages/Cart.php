<?php

	namespace App\Http\Livewire\Pages;

	use App\Models\CartCodes;
	use Livewire\Component;

	class Cart extends Component
	{
		public $cart_codes = [];
		protected $listeners = [
			'removeFromCart',
		];

		public function buy() {
			foreach ($this->cart_codes as $cart_code) {
				// Imposto "active" a 0
				$cart_code->update([
					'active' => false
				]);
				// Associo il codice acquistato all'utente (purchases)
			}
			// Elimino il carrello utente
			CartCodes::where('user_id', auth()->user()->id)->delete();
			$this->emit('openModal', 'purchased-modal');
		}

		public function removeFromCart($id) {
			CartCodes::where('user_id', auth()->user()->id)->where('coupon_id', $id)->delete();
			$this->emit('$refresh');
		}

		public function render() {
			$this->cart_codes = auth()->user()->cart_codes;
			return view('livewire.pages.cart', [
				'coupons' => $this->cart_codes,
			])->layout('layouts.guest');
		}
	}
