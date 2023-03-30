<?php

namespace App\Http\Livewire\Pages;

use App\Models\Brand;
use App\Models\HeroSlide;
use Livewire\Component;

class Homepage extends Component
{
    public function render()
    {
        return view('livewire.pages.homepage', [
			'slides' => HeroSlide::all(),
			'our_brands' => Brand::whereHas('coupons')->get()->take(8),
			'unmissables' => \App\Models\Coupon::all()->take(8),
			'week_offers' => \App\Models\Coupon::all()->take(8),
        ])->layout('layouts.guest');
    }
}
