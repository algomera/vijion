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
			return view('livewire.pages.homepage', [
				'slides'           => HeroSlide::all(),
				'our_brands'       => Brand::whereHas('coupons')->get()->take(8),
				'unmissables'      => \App\Models\Coupon::all()->take(8),
				'week_offers'      => \App\Models\Coupon::all()->take(8),
				'filtered_coupons' => $filtered_coupons,
			])->layout('layouts.guest');
		}
	}
