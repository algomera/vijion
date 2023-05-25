<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\HighlightedCategories;

	use App\Models\Category;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class EditCategory3 extends ModalComponent
	{
		use WithFileUploads;

		public $category;
		public $new_image;
		protected $rules = [
			'category.highlighted_title'      => 'required',
			'category.highlighted_subtitle'   => 'required',
			'category.highlighted_background' => 'nullable|string',
		];

		public function mount(Category $category) {
			$this->category = $category;
		}

		public function save() {
			$this->validate();
			if ($this->new_image) {
				$this->validate([
					'new_image' => 'required|image|max:1024',
				]);
				$filename = $this->new_image->getClientOriginalName();
				$ext = substr(strrchr($filename, '.'), 1);
				$image_path = Storage::disk('public')->putFileAs('storage/categories/highlighted', $this->new_image, Str::slug($this->category->name) . '.' . $ext);
			}
			$this->category->update([
				'highlighted_title'      => $this->category->highlighted_title,
				'highlighted_subtitle'   => $this->category->highlighted_subtitle,
				'highlighted_background' => $this->new_image ? $image_path : $this->category->highlighted_background,
			]);
			$this->closeModal();
			$this->emit('category-updated');
		}

		public function render() {
			return view('livewire.admin.pages.settings.widget.highlighted-categories.edit-category3');
		}
	}
