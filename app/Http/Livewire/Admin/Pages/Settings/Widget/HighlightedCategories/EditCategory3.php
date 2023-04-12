<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\HighlightedCategories;

	use App\Models\Category;
	use LivewireUI\Modal\ModalComponent;

	class EditCategory3 extends ModalComponent
	{
		public $category;
		protected $rules = [
			'category.highlighted_title'    => 'nullable',
			'category.highlighted_subtitle' => 'nullable',
		];

		public function mount(Category $category) {
			$this->category = $category;
		}

		public function save() {
			$this->category->update([
				'highlighted_title'    => $this->category->highlighted_title,
				'highlighted_subtitle' => $this->category->highlighted_subtitle,
			]);
			$this->emit('category-updated');
			$this->closeModal();
		}

		public function render() {
			return view('livewire.admin.pages.settings.widget.highlighted-categories.edit-category3');
		}
	}
