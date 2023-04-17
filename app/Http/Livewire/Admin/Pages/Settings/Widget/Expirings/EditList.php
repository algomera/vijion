<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\Expirings;

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
				'expiring'       => 1,
				'expiring_order' => Brand::where('expiring', 1)->count()
			]);
			$this->reset('search_all');
			$this->emit('update-list');
		}

		public function remove(Brand $brand) {
			$brand->update([
				'expiring'       => 0,
				'expiring_order' => null
			]);
			$this->reset('search_added');
			$this->emit('update-list');
		}

		public function sortExpiringsOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				Brand::where('id', $id)->update([
					'expiring_order' => $index
				]);
			}
		}

		public function render() {
			$all_brands = Brand::where('expiring', 0);
			$expirings = Brand::where('expiring', 1);
			if ($this->search_all) {
				$all_brands->where('name', 'like', '%' . $this->search_all . '%');
			}
			if ($this->search_added) {
				$expirings->where('name', 'like', '%' . $this->search_added . '%');
			}
			return view('livewire.admin.pages.settings.widget.expirings.edit-list', [
				'all_brands' => $all_brands->get(),
				'expirings' => $expirings->orderBy('expiring_order')->get()
			]);
		}
	}
