<?php

	namespace App\Http\Livewire\Admin\Pages\Categories;

	use App\Models\Category;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		use WithFileUploads;

		public $name;
		public $image;

		public function create() {
			$this->validate([
				'name' => 'required',
				'image' => 'required|image|max:1024', // 1MB max
			]);

			$filename = $this->image->getClientOriginalName();
			$ext = substr(strrchr($filename, '.'), 1);

			$image_path = Storage::disk('public')->putFileAs('categories', $this->image, Str::slug($this->name) . '.' . $ext);
			$category = Category::create([
				'name' => $this->name,
				'slug' => Str::slug($this->name),
				'image_path' => $image_path,
			]);

			$this->emit('category-created');
			$this->closeModal();

		}
		public function render() {
			return view('livewire.admin.pages.categories.create');
		}
	}
