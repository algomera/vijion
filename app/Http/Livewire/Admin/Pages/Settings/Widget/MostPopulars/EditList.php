<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\MostPopulars;

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
				'most_popular'       => 1,
				'most_popular_order' => Brand::where('most_popular', 1)->count()
			]);
			$this->reset('search_all');
			$this->emit('update-list');
		}

		public function remove(Brand $brand) {
			$brand->update([
				'most_popular'       => 0,
				'most_popular_order' => null
			]);
			$this->reset('search_added');
			$this->emit('update-list');
		}

		public function sortMostPopularsOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				Brand::where('id', $id)->update([
					'most_popular_order' => $index
				]);
			}
		}

		public function render() {
			$all_brands = Brand::where('most_popular', 0);
			$most_populars = Brand::where('most_popular', 1);
			if ($this->search_all) {
				$all_brands->where('name', 'like', '%' . $this->search_all . '%');
			}
			if ($this->search_added) {
				$most_populars->where('name', 'like', '%' . $this->search_added . '%');
			}
			return view('livewire.admin.pages.settings.widget.most-populars.edit-list', [
				'all_brands' => $all_brands->get(),
				'most_populars' => $most_populars->orderBy('most_popular_order')->get()
			]);
		}
	}
