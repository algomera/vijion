<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\WeekOffers;

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
				'week_offer'       => 1,
				'week_offer_order' => Brand::where('week_offer', 1)->count()
			]);
			$this->reset('search_all');
		}

		public function remove(Brand $brand) {
			$brand->update([
				'week_offer'       => 0,
				'week_offer_order' => null
			]);
			$this->reset('search_added');
		}

		public function sortOurBrandsOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				Brand::where('id', $id)->update([
					'week_offer_order' => $index
				]);
			}
		}

		public function render() {
			$all_brands = Brand::where('week_offer', 0);
			$week_offers = Brand::where('week_offer', 1);
			if ($this->search_all) {
				$all_brands->where('name', 'like', '%' . $this->search_all . '%');
			}
			if ($this->search_added) {
				$week_offers->where('name', 'like', '%' . $this->search_added . '%');
			}
			return view('livewire.admin.pages.settings.widget.week-offers.edit-list', [
				'all_brands' => $all_brands->get(),
				'week_offers' => $week_offers->orderBy('week_offer_order')->get()
			]);
		}
	}
