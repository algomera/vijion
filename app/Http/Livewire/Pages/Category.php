<?php

	namespace App\Http\Livewire\Pages;

	use App\Models\Brand;
	use Livewire\Component;

	class Category extends Component
	{
		public \App\Models\Category $category;

		public function render() {
			return view('livewire.pages.category', [
				'brands' => Brand::whereHas('coupons')->where('category_id', $this->category->id)->get()
			])->layout('layouts.guest');
		}
	}
