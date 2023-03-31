<?php

	namespace App\Http\Livewire;

	use App\Models\CartCodes;
	use App\Models\Coupon;
	use LivewireUI\Modal\ModalComponent;

	class BrandExistsInCartModal extends ModalComponent
	{
		public $to_be_add;
		public $existing;

		public static function modalMaxWidth(): string
		{
			return '2xl';
		}

		public function mount($to_be_add, $existing) {
			$this->to_be_add = Coupon::find($to_be_add);
			$this->existing = Coupon::find($existing);
		}

		public function replaceCoupon() {
			$cart_code = CartCodes::where('user_id', auth()->user()->id)->where('brand_id', $this->existing->brand->id)->first();
			$code = $this->to_be_add->codes()->active(true)->inRandomOrder()->first();
			$cart_code->update([
				'coupon_id'      => $this->to_be_add->id,
				'coupon_code_id' => $code->id
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Coupon sostituito',
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

		public function render() {
			return view('livewire.brand-exists-in-cart-modal');
		}
	}
