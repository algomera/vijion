<?php

	namespace App\Http\Livewire\Admin\Pages\Categories;

	use App\Models\Category;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		use WithFileUploads;

		public $category;
		public $new_image;
        public $lang = 'it';
		protected $rules = [
			'category.name_it'       => 'required',
            'category.name_en'       => 'nullable',
			'category.image_path' => 'required|string',
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
				$image_path = Storage::disk('public')->putFileAs('storage/categories', $this->new_image, Str::slug($this->category->name) . '.' . $ext);
			}
			$this->category->update([
				'name_it'       => $this->category->name_it,
                'name_en'       => $this->category->name_en,
				'slug'       => Str::slug($this->category->name),
				'image_path' => $this->new_image ? $image_path : $this->category->image_path
			]);
			$this->closeModal();
			$this->emit('category-updated');
		}

		public function render() {
			return view('livewire.admin.pages.categories.edit');
		}
	}
