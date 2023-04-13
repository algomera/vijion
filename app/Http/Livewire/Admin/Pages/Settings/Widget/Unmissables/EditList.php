<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\Unmissables;

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
				'unmissable'       => 1,
				'unmissable_order' => Brand::where('unmissable', 1)->count()
			]);
			$this->reset('search_all');
			$this->emit('update-list');
		}

		public function remove(Brand $brand) {
			$brand->update([
				'unmissable'       => 0,
				'unmissable_order' => null
			]);
			$this->reset('search_added');
			$this->emit('update-list');
		}

		public function sortUnmissableOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				Brand::where('id', $id)->update([
					'unmissable_order' => $index
				]);
			}
		}

		public function render() {
			$all_brands = Brand::where('unmissable', 0);
			$unmissables = Brand::where('unmissable', 1);
			if ($this->search_all) {
				$all_brands->where('name', 'like', '%' . $this->search_all . '%');
			}
			if ($this->search_added) {
				$unmissables->where('name', 'like', '%' . $this->search_added . '%');
			}
			return view('livewire.admin.pages.settings.widget.unmissables.edit-list', [
				'all_brands' => $all_brands->get(),
				'unmissables' => $unmissables->orderBy('unmissable_order')->get()
			]);
		}
	}
