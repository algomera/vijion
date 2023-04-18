<?php

	namespace App\Http\Livewire\Pages;

	use App\Models\CartCodes;
	use App\Notifications\SendCouponCodeNotification;
	use Carbon\Carbon;
	use Livewire\Component;

	class Cart extends Component
	{
		public $cart_codes = [];
		protected $listeners = [
			'removeFromCart',
		];

		public function buy() {
			if (auth()->user()->coins < $this->cart_codes->sum('coupon.coins')) {
				$this->dispatchBrowserEvent('open-notification', [
					'title'    => 'Coins insufficienti',
					'subtitle' => 'Non hai abbastanza VIJI-COINS. Elimina qualche coupon dal carrello oppure guadagna VIJI-COINS e riprova.',
					'type'     => 'error',
					'actions'  => [
						'primary' => [
							'label'  => 'Guadagna VIJI-COINS',
							'url'    => 'https://vijion.tv/',
							'target' => '_blank'
						]
					]
				]);
				return false;
			}
			foreach ($this->cart_codes as $cart_code) {
				$cart_code->update([
					'active' => false
				]);
				auth()->user()->purchases()->create([
					'coupon_code_id' => $cart_code->id,
					'purchased_at'   => Carbon::now()
				]);
				auth()->user()->decrement('coins', $this->cart_codes->sum('coupon.coins'));
				auth()->user()->notify(new SendCouponCodeNotification(auth()->user(), $cart_code));
				$this->emit('user-coins-updated');
			}
			// Elimino il carrello utente
			CartCodes::where('user_id', auth()->user()->id)->delete();
			$this->emit('openModal', 'purchased-modal');
		}

		public function removeFromCart($id) {
			CartCodes::where('user_id', auth()->user()->id)->where('coupon_id', $id)->delete();
			$this->emit('code-removed');
			$this->emit('$refresh');
		}

		public function render() {
			if (auth()->check()) {
				$this->cart_codes = auth()->user()->cart_codes;
			} else {
				$this->cart_codes = collect();
			}
			return view('livewire.pages.cart', [
				'coupons' => $this->cart_codes,
			])->layout('layouts.guest');
		}
	}
