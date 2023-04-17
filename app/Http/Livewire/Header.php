<?php

	namespace App\Http\Livewire;

	use App\Models\Brand;
	use App\Models\Category;
	use Illuminate\Support\Facades\Auth;
	use Livewire\Component;

	class Header extends Component
	{
		public $search;
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
			if ($this->search) {
				$search_results = Brand::where('name', 'like', '%' . $this->search . '%')->get();
			}
			return view('livewire.header', [
				'search_results' => $search_results ?? null,
				'categories'     => Category::whereHas('brands.coupons', function ($coupons) {
					$coupons->available();
				})->get()->take(6),
				'brands'         => Brand::whereHas('coupons', function ($coupons) {
					$coupons->available();
				})->orderByRaw('-our_brand_order DESC')->get()->take(6),
			]);
		}
	}
