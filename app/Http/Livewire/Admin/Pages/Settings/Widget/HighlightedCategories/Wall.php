<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\HighlightedCategories;

	use App\Models\Category;
	use Livewire\Component;

	class Wall extends Component
	{
		public $category_1;
		public $category_2;
		public $category_3;
		public $selected_category_1;
		public $selected_category_2;
		public $selected_category_3;
		protected $listeners = [
			'category-updated' => '$refresh'
		];

		public function mount() {
			$this->selected_category_1 = Category::where('highlighted_spot', 1)->first();
			if($this->selected_category_1) {
				$this->category_1 = $this->selected_category_1->id;
			}

			$this->selected_category_2 = Category::where('highlighted_spot', 2)->first();
			if($this->selected_category_2) {
				$this->category_2 = $this->selected_category_2->id;
			}

			$this->selected_category_3 = Category::where('highlighted_spot', 3)->first();
			if($this->selected_category_3) {
				$this->category_3 = $this->selected_category_3->id;
			}
		}

		public function updatedCategory1($id) {
			if(!$id) {
				Category::where('highlighted_spot', 1)->update([
					'highlighted_spot' => null
				]);
			}
			if ($this->category_2 == $id) {
				$this->category_2 = null;
				$this->selected_category_2 = null;
			}
			if ($this->category_3 == $id) {
				$this->category_3 = null;
				$this->selected_category_3 = null;
			}
			$this->selected_category_1 = Category::find($id);
			if ($this->selected_category_1) {
				Category::where('highlighted_spot', 1)->update([
					'highlighted_spot' => null
				]);
				$this->selected_category_1->update([
					'highlighted_spot' => 1
				]);
			}
		}

		public function updatedCategory2($id) {
			if(!$id) {
				Category::where('highlighted_spot', 2)->update([
					'highlighted_spot' => null
				]);
			}
			if ($this->category_1 == $id) {
				$this->category_1 = null;
				$this->selected_category_1 = null;
			}
			if ($this->category_3 == $id) {
				$this->category_3 = null;
				$this->selected_category_3 = null;
			}
			$this->selected_category_2 = Category::find($id);
			if ($this->selected_category_2) {
				Category::where('highlighted_spot', 2)->update([
					'highlighted_spot' => null
				]);
				$this->selected_category_2->update([
					'highlighted_spot' => 2
				]);
			}
		}

		public function updatedCategory3($id) {
			if(!$id) {
				Category::where('highlighted_spot', 3)->update([
					'highlighted_spot' => null
				]);
			}
			if ($this->category_1 == $id) {
				$this->category_1 = null;
				$this->selected_category_1 = null;
			}
			if ($this->category_2 == $id) {
				$this->category_2 = null;
				$this->selected_category_2 = null;
			}
			$this->selected_category_3 = Category::find($id);
			if ($this->selected_category_3) {
				Category::where('highlighted_spot', 3)->update([
					'highlighted_spot' => null
				]);
				$this->selected_category_3->update([
					'highlighted_spot' => 3
				]);
			}
		}

		public function render() {
			$categories = Category::all();
			return view('livewire.admin.pages.settings.widget.highlighted-categories.wall', [
				'categories' => $categories
			]);
		}
	}
