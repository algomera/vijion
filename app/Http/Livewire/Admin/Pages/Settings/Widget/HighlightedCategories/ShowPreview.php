<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\HighlightedCategories;

	use App\Models\Category;
	use LivewireUI\Modal\ModalComponent;

	class ShowPreview extends ModalComponent
	{
		public $category_1;
		public $category_2;
		public $category_3;

		public static function modalMaxWidth(): string {
			return '7xl';
		}

		public function mount() {
			$this->category_1 = Category::where('highlighted_spot', 1)->first();
			$this->category_2 = Category::where('highlighted_spot', 2)->first();
			$this->category_3 = Category::where('highlighted_spot', 3)->first();
		}
		public function render() {
			return view('livewire.admin.pages.settings.widget.highlighted-categories.show-preview');
		}
	}
