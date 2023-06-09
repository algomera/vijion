<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use App\Models\Brand;
	use Livewire\Component;
	use Livewire\WithPagination;

	class Index extends Component
	{
		use WithPagination;

		public $search;

		public function render() {
			$brands = Brand::with('category');
			if ($this->search) {
				$brands->whereHas('category', function ($category) {
					$category->where('name', 'like', '%' . $this->search . '%');
				})->orWhere('name', 'like', '%' . $this->search . '%');
			}
			return view('livewire.admin.pages.brands.index', [
				'brands' => $brands->orderBy('name')->paginate(25)
			]);
		}
	}
