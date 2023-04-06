<?php

	namespace App\Http\Livewire;

	use App\Models\Brand;
	use App\Models\Category;
	use Illuminate\Support\Facades\Auth;
	use Livewire\Component;

	class Header extends Component
	{
		protected $listeners = [
			'user-status-updated' => '$refresh',
			'user-coins-updated'  => '$refresh',
			'code-added'          => '$refresh',
			'code-removed'        => '$refresh'
		];

		public function logout() {
			Auth::logout();
			return redirect()->route('home');
		}

		public function render() {
			return view('livewire.header', [
				'categories' => Category::whereHas('brands.coupons', function($coupons) {
					$coupons->available();
				})->get()->take(6),
				'brands'     => Brand::whereHas('coupons', function($coupons) {
					$coupons->available();
				})->get()->take(6),
			]);
		}
	}
