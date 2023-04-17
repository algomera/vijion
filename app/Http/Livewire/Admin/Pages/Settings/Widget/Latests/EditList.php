<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\Latests;

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
				'latest'       => 1,
				'latest_order' => Brand::where('latest', 1)->count()
			]);
			$this->reset('search_all');
			$this->emit('update-list');
		}

		public function remove(Brand $brand) {
			$brand->update([
				'latest'       => 0,
				'latest_order' => null
			]);
			$this->reset('search_added');
			$this->emit('update-list');
		}

		public function sortLatestsOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				Brand::where('id', $id)->update([
					'latest_order' => $index
				]);
			}
		}

		public function render() {
			$all_brands = Brand::where('latest', 0);
			$latests = Brand::where('latest', 1);
			if ($this->search_all) {
				$all_brands->where('name', 'like', '%' . $this->search_all . '%');
			}
			if ($this->search_added) {
				$latests->where('name', 'like', '%' . $this->search_added . '%');
			}
			return view('livewire.admin.pages.settings.widget.latests.edit-list', [
				'all_brands' => $all_brands->get(),
				'latests' => $latests->orderBy('latest_order')->get()
			]);
		}
	}
