<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use App\Models\Brand;
	use App\Models\Coupon;
	use Livewire\Component;
	use Livewire\WithPagination;

	class Show extends Component
	{
		use WithPagination;

		public Brand $brand;
		public $search;

		protected $listeners = [
			'brand-updated' => '$refresh'
		];

		public function show($uuid) {
			$coupon = Coupon::where('uuid', $uuid)->first();
			return redirect()->route('coupons.show', [
				'brand'  => $coupon->brand->slug,
				'coupon' => $coupon->uuid
			]);
		}

		public function render() {
			$coupons = $this->brand->coupons()->with([
				'codes',
			]);
			if ($this->search) {
				$coupons->where('uuid', 'like', '%' . $this->search . '%');
			}
			return view('livewire.admin.pages.brands.show', [
				'coupons' => $coupons->paginate(25)
			]);
		}
	}
