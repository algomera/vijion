<?php

	namespace App\Http\Livewire\Pages;

	use App\Models\CartCodes;
	use Illuminate\Support\Facades\Auth;
	use Livewire\Component;

	class Coupon extends Component
	{
		public \App\Models\Coupon $coupon;

		protected $listeners = [
			'code-added' => '$refresh'
		];

		public function addToCart() {
			if(Auth::check()) {
				if(auth()->user()->cart_codes()->where('brand_id', $this->coupon->brand->id)->count()) {
					$this->emit('openModal', 'brand-exists-in-cart-modal', [
						'to_be_add' => $this->coupon->id,
						'existing' => auth()->user()->cart_codes()->where('brand_id', $this->coupon->brand->id)->first()['coupon_id'],
					]);
				} else {
					$code = $this->coupon->codes()->active(true)->inRandomOrder()->first();
					CartCodes::create([
						'user_id' => auth()->user()->id,
						'brand_id' => $this->coupon->brand->id,
						'coupon_id' => $this->coupon->id,
						'coupon_code_id' => $code->id
					]);
					$this->dispatchBrowserEvent('open-notification', [
						'title' => 'Coupon aggiunto',
						'type'  => 'success',
						'actions'  => [
							'primary' => [
								'label' => 'Visualizza il carrello',
								'url'   => route('cart')
							]
						]
					]);
					$this->emit('code-added');
				}
			} else {
				$this->emit('openModal', 'auth.login-modal');
			}
		}

		public function render() {
			return view('livewire.pages.coupon')->layout('layouts.guest');
		}
	}
