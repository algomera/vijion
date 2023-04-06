<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use Livewire\Component;
	use Livewire\WithPagination;

	class Coupon extends Component
	{
		use WithPagination;

		public \App\Models\Coupon $coupon;
		public $search;
		public $active = true;

		protected $listeners = [
			'coupon-updated' => '$refresh'
		];

		public function render() {
			$codes = $this->coupon->codes()->active($this->active);
			if ($this->search) {
				$codes->where('code', 'like', '%' . $this->search . '%');
			}

			return view('livewire.admin.pages.brands.coupon', [
				'codes' => $codes->paginate(25)
			]);
		}
	}
