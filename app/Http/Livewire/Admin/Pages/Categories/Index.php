<?php

	namespace App\Http\Livewire\Admin\Pages\Categories;

	use App\Models\Category;
	use Livewire\Component;
	use Livewire\WithPagination;

	class Index extends Component
	{
		use WithPagination;

		public $search;
		protected $listeners = [
			'category-created' => '$refresh',
			'category-updated' => '$refresh'
		];

		public function render() {
			$categories = Category::query();
			if ($this->search) {
				$categories->where('name_it', 'like', '%' . $this->search . '%');
			}
			return view('livewire.admin.pages.categories.index', [
				'categories' => $categories->orderBy('name_it')->paginate(25)
			]);
		}
	}
