<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\OnlyOn;

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
				'only_on'       => 1,
				'only_on_order' => Brand::where('only_on', 1)->count()
			]);
			$this->reset('search_all');
			$this->emit('update-list');
		}

		public function remove(Brand $brand) {
			$brand->update([
				'only_on'       => 0,
				'only_on_order' => null
			]);
			$this->reset('search_added');
			$this->emit('update-list');
		}

		public function sortOnlyOnsOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				Brand::where('id', $id)->update([
					'only_on_order' => $index
				]);
			}
		}

		public function render() {
			$all_brands = Brand::where('only_on', 0);
			$only_ons = Brand::where('only_on', 1);
			if ($this->search_all) {
				$all_brands->where('name', 'like', '%' . $this->search_all . '%');
			}
			if ($this->search_added) {
				$only_ons->where('name', 'like', '%' . $this->search_added . '%');
			}
			return view('livewire.admin.pages.settings.widget.only-on.edit-list', [
				'all_brands' => $all_brands->get(),
				'only_ons' => $only_ons->orderBy('only_on_order')->get()
			]);
		}
	}
