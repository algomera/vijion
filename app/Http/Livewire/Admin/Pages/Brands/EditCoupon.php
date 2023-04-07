<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class EditCoupon extends ModalComponent
	{
		use WithFileUploads;

		public $coupon;
		public $new_bg;

		public static function modalMaxWidth(): string {
			return '5xl';
		}

		protected function rules() {
			return [
				'coupon.amount'       => 'required|numeric|min:1',
				'coupon.coins'        => 'required|numeric|min:1',
				'coupon.bg'           => 'nullable',
				'coupon.type'         => 'required|in:percentage,cash',
				'coupon.text_color'   => 'required|in:text-white,text-gray-800',
				'coupon.expires_date' => $this->coupon->expires_date === null ? 'nullable' : 'date|after:tomorrow',
				'coupon.active'       => 'boolean'
			];
		}

		public function mount(\App\Models\Coupon $coupon) {
			$this->coupon = $coupon;
		}

		public function updatedCouponActive() {
			$this->emit('$refresh');
		}

		public function updatedCouponExpiresDate($val) {
			if (!$val) {
				$this->coupon->expires_date = null;
			}
		}

		public function save() {
			$this->validate();
			if ($this->new_bg) {
				$this->validate([
					'new_bg' => 'image|max:1024'
				]);
				$filename = $this->new_bg->getClientOriginalName();
				$ext = substr(strrchr($filename, '.'), 1);
				$bg_path = Storage::disk('public')->putFileAs('coupons', $this->new_bg, Str::slug($this->coupon->uuid) . '.' . $ext);
			}
			$this->coupon->update([
				'amount'       => $this->coupon->amount,
				'coins'        => $this->coupon->coins,
				'type'         => $this->coupon->type,
				'bg'           => $this->new_bg ? $bg_path : $this->coupon->bg,
				'text_color'   => $this->coupon->text_color,
				'expires_date' => $this->coupon->expires_date
			]);
			$this->closeModal();
			$this->emit('coupon-updated');
		}

		public function render() {
			return view('livewire.admin.pages.brands.edit-coupon');
		}
	}
