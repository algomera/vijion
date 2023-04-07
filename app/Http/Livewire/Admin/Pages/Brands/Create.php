<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use App\Models\Brand;
	use App\Models\Category;
	use App\Models\Rules;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		use WithFileUploads;

		public $name;
		public $category;
		public $logo;
		public $brand_rules = [];
		protected $rules = [
			'brand_rules.*.body' => 'required',
			'name'               => 'required',
			'category'           => 'required',
			'logo'               => 'required|image|max:1024',
		];

		public function addBrandRule() {
			$this->brand_rules[] = new Rules();
		}

		public function removeBrandRule($index) {
			unset($this->brand_rules[$index]);
		}

		public function create() {
			$this->validate();
			$filename = $this->logo->getClientOriginalName();
			$ext = substr(strrchr($filename, '.'), 1);
			$logo_path = Storage::disk('public')->putFileAs('brands', $this->logo, Str::slug($this->name) . '.' . $ext);
			$brand = Brand::create([
				'name'        => $this->name,
				'slug'        => Str::slug($this->name),
				'logo_path'   => $logo_path,
				'category_id' => $this->category
			]);
			foreach ($this->brand_rules as $brand_rule) {
				$brand->rules()->create($brand_rule);
			}
			return redirect()->route('brands.show', $brand->slug);
		}

		public function render() {
			return view('livewire.admin.pages.brands.create', [
				'categories' => Category::all()
			]);
		}
	}
