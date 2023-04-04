<?php

	namespace App\Http\Livewire\Admin\Pages\Users;

	use App\Models\User;
	use Livewire\Component;
	use Livewire\WithPagination;

	class Show extends Component
	{
		use WithPagination;

		public User $user;
		public $search;

		public function render() {
			$purchases = $this->user->purchases()->with([
				'coupon_code',
				'coupon_code.coupon',
				'coupon_code.coupon.brand'
			]);
			if ($this->search) {
				$purchases->whereHas('coupon_code', function ($coupon_code) {
					$coupon_code->where('code', 'like', '%' . $this->search . '%');
					$coupon_code->orWhereHas('coupon', function ($coupon) {
						$coupon->whereHas('brand', function ($brand) {
							$brand->where('name', 'like', '%' . $this->search . '%');
						});
					});
				});
			}
			return view('livewire.admin.pages.users.show', [
				'purchases' => $purchases->orderBy('purchased_at')->paginate(25)
			]);
		}
	}
