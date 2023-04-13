<?php

	namespace App\Http\Livewire\Pages;

	use App\Models\Brand;
	use App\Models\HeroSlide;
	use Livewire\Component;

	class Homepage extends Component
	{
		public $tabs = [
			'most_popular' => 'I più richiesti',
			'latest'       => 'Gli ultimi arrivi',
			'only_on'      => 'Solo su Viji-Store',
			'expiring'     => 'In scadenza!'
		];
		public $selectedTab = 'most_popular';

		public function render() {
			switch ($this->selectedTab) {
				case 'most_popular':
					$filtered_coupons = \App\Models\Coupon::all()->shuffle()->take(3);
					break;
				case 'latest':
					$filtered_coupons = \App\Models\Coupon::all()->shuffle()->take(5);
					break;
				case 'only_on':
					$filtered_coupons = \App\Models\Coupon::all()->shuffle()->take(4);
					break;
				case 'expiring':
					$filtered_coupons = \App\Models\Coupon::all()->shuffle()->take(2);
					break;
			}
			$brands = Brand::whereHas('coupons');
			return view('livewire.pages.homepage', [
				'slides'           => HeroSlide::where('visible', 1)->get()->sortBy('order'),
				'our_brands'       => $brands->where('our_brand', 1)->get()->take(8),
				'unmissables'      => $brands->where('unmissable', 1)->get()->take(8),
				'week_offers'      => $brands->where('week_offer', 1)->get()->take(8),
				'category_1' => \App\Models\Category::where('highlighted_spot', 1)->first(),
				'category_2' => \App\Models\Category::where('highlighted_spot', 2)->first(),
				'category_3' => \App\Models\Category::where('highlighted_spot', 3)->first(),
				'filtered_coupons' => $filtered_coupons,
			])->layout('layouts.guest');
		}
	}
