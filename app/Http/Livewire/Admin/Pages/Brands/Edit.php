<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use App\Models\Brand;
	use App\Models\Category;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		use WithFileUploads;

		public $brand;
		public $new_logo;
		protected $rules = [
			'brand.name'        => 'required',
			'brand.logo_path'   => 'required|string',
			'brand.category_id' => 'required'
		];

		public function mount(Brand $brand) {
			$this->brand = $brand;
		}

		public function save() {
			$this->validate();
			if ($this->new_logo) {
				$this->validate([
					'new_logo' => 'required|image|max:1024',
				]);
				$filename = $this->new_logo->getClientOriginalName();
				$ext = substr(strrchr($filename, '.'), 1);
				$logo_path = Storage::disk('public')->putFileAs('brands', $this->new_logo, Str::slug($this->brand->name) . '.' . $ext);
			}
			$this->brand->update([
				'name'      => $this->brand->name,
				'slug'      => Str::slug($this->brand->name),
				'logo_path' => $this->new_logo ? $logo_path : $this->brand->logo_path
			]);
			$this->closeModal();
			$this->emit('brand-updated');
		}

		public function render() {
			return view('livewire.admin.pages.brands.edit', [
				'categories' => Category::all(),
			]);
		}
	}
