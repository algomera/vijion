<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use App\Models\Brand;
	use App\Models\Category;
	use App\Models\Rules;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		use WithFileUploads;

		public $brand;
		public $new_logo;
		public $brand_rules = [];
        public $lang = 'it';
		protected $rules = [
            'brand.visible_it' => 'boolean',
            'brand.visible_en' => 'boolean',
			'brand_rules.*.body_it' => 'required',
            'brand_rules.*.body_en' => 'nullable',
			'brand.name'        => 'required',
			'brand.logo_path'   => 'required|string',
			'brand.category_id' => 'required'
		];

		public function mount(Brand $brand) {
			$this->brand = $brand;
            $this->brand_rules = $this->brand->rules()->orderBy('order')->get();
		}

		public function addBrandRule() {
			$this->brand_rules[] = $this->brand->rules()->create([
				'body_it' => '',
                'body_en' => '',
				'order' => $this->brand->rules()->count() === 0 ? 0 : $this->brand->rules()->count()
			]);
		}

		public function removeBrandRule($index) {
			$brand_rule = $this->brand_rules[$index];
			unset($this->brand_rules[$index]);
			$brand_rule->delete();
		}
		public function sortBrandRulesOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				$this->brand->rules()->where('id', $id)->update([
					'order' => $index
				]);
			}

            $this->brand_rules = $this->brand->rules()->orderBy('order')->get();
		}
		public function save() {
			$this->validate();
			if ($this->new_logo) {
				$this->validate([
					'new_logo' => 'required|image|max:1024',
				]);
				$filename = $this->new_logo->getClientOriginalName();
				$ext = substr(strrchr($filename, '.'), 1);
				$logo_path = Storage::disk('public')->putFileAs('storage/brands', $this->new_logo, Str::slug($this->brand->name) . '.' . $ext);
			}
			$this->brand->update([
				'name'      => $this->brand->name,
				'slug'      => Str::slug($this->brand->name),
				'logo_path' => $this->new_logo ? $logo_path : $this->brand->logo_path
			]);
			foreach ($this->brand_rules as $brand_rule) {
				$this->brand->rules()->updateOrCreate(['id' => $brand_rule->id], [
					'body_it' => $brand_rule->body_it,
                    'body_en' => $brand_rule->body_en,
				]);
			}
			$this->closeModal();
			$this->emit('brand-updated');
		}

		public function render() {
			return view('livewire.admin.pages.brands.edit', [
				'categories' => Category::all(),
			]);
		}
	}
