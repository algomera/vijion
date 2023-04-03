<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use App\Models\Brand;
	use Livewire\Component;

	class Index extends Component
	{
		public function render() {
			return view('livewire.admin.pages.brands.index', [
				'brands' => Brand::all()
			]);
		}
	}
