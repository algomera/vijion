<?php

	namespace App\Http\Livewire\Pages;

	use Livewire\Component;
	use Livewire\WithPagination;

	class Categories extends Component
	{
		use WithPagination;
		public function render() {
			return view('livewire.pages.categories', [
				'categories' => \App\Models\Category::whereHas('brands.coupons', function ($coupons) {
					$coupons->available();
				})->paginate(25)
			])->layout('layouts.guest');
		}
	}
