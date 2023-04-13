<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\OurBrands;

	use App\Models\Brand;
	use LivewireUI\Modal\ModalComponent;

	class EditList extends ModalComponent
	{
		public $search_all;
		public $search_added;

		public static function modalMaxWidth(): string {
			return '5xl';
		}

		public function add(Brand $brand) {
			$brand->update([
				'our_brand'       => 1,
				'our_brand_order' => Brand::where('our_brand', 1)->count()
			]);
			$this->reset('search_all');
			$this->emit('update-list');
		}

		public function remove(Brand $brand) {
			$brand->update([
				'our_brand'       => 0,
				'our_brand_order' => null
			]);
			$this->reset('search_added');
			$this->emit('update-list');
		}

		public function sortOurBrandsOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				Brand::where('id', $id)->update([
					'our_brand_order' => $index
				]);
			}
		}

		public function render() {
			$all_brands = Brand::where('our_brand', 0);
			$our_brands = Brand::where('our_brand', 1);
			if ($this->search_all) {
				$all_brands->where('name', 'like', '%' . $this->search_all . '%');
			}
			if ($this->search_added) {
				$our_brands->where('name', 'like', '%' . $this->search_added . '%');
			}
			return view('livewire.admin.pages.settings.widget.our-brands.edit-list', [
				'all_brands' => $all_brands->get(),
				'our_brands' => $our_brands->orderBy('our_brand_order')->get()
			]);
		}
	}
