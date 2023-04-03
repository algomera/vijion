<?php

	namespace App\Http\Livewire\Admin\Pages\Categories;

	use App\Models\Category;
	use Livewire\Component;

	class Index extends Component
	{
		public function render() {
			return view('livewire.admin.pages.categories.index', [
				'categories' => Category::all()
			]);
		}
	}
