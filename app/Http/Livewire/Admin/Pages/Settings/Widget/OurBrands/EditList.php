<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\OurBrands;

	use App\Models\Brand;
	use LivewireUI\Modal\ModalComponent;

	class EditList extends ModalComponent
	{
		public $search_all;
		public $search_our;

		public static function modalMaxWidth(): string {
			return '5xl';
		}

		public function add(Brand $brand) {
			$brand->update([
				'our_brand' => 1
			]);
			$this->reset('search_all');
		}

		public function remove(Brand $brand) {
			$brand->update([
				'our_brand' => 0
			]);
			$this->reset('search_our');
		}

		public function render() {
			$all_brands = Brand::where('our_brand', 0);
			$our_brands = Brand::where('our_brand', 1);

			if ($this->search_all) {
				$all_brands->where('name', 'like', '%' . $this->search_all . '%');
			}
			if ($this->search_our) {
				$our_brands->where('name', 'like', '%' . $this->search_our . '%');
			}
			return view('livewire.admin.pages.settings.widget.our-brands.edit-list', [
				'all_brands' => $all_brands->get(),
				'our_brands' => $our_brands->get()
			]);
		}
	}
