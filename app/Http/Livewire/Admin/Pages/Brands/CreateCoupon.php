<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use App\Models\Brand;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class CreateCoupon extends ModalComponent
	{
		use WithFileUploads;

		public $brand;
		public $amount;
		public $coins;
		public $type = 'cash';
		public $bg;
		public $text_color = 'text-white';
		public $expires_date = null;

		public static function modalMaxWidth(): string {
			return '5xl';
		}

		protected function rules() {
			return [
				'amount'       => 'required|min:1',
				'coins'        => 'required|min:1',
				'type'         => 'required|in:percentage,cash',
				'bg'           => $this->bg ? 'image|max:1024' : 'nullable',
				'text_color'   => 'required|in:text-white,text-gray-800',
				'expires_date' => 'nullable|date|after:tomorrow'
			];
		}

		public function mount(Brand $brand) {
			$this->brand = $brand;
		}

		public function create() {
			$this->validate();
			$uuid = Str::uuid();
			if ($this->bg) {
				$filename = $this->bg->getClientOriginalName();
				$ext = substr(strrchr($filename, '.'), 1);
				$bg_path = Storage::disk('public')->putFileAs('coupons', $this->bg, Str::slug($uuid) . '.' . $ext);
			}
			$this->brand->coupons()->create([
				'uuid'         => $uuid,
				'amount'       => $this->amount,
				'coins'        => $this->coins,
				'type'         => $this->type,
				'bg'           => $this->bg ? $bg_path : null,
				'text_color'   => $this->text_color,
				'expires_date' => $this->expires_date
			]);
			$this->closeModal();
			$this->emit('coupon-created');
		}

		public function render() {
			return view('livewire.admin.pages.brands.create-coupon');
		}
	}
