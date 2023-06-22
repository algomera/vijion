<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\HeroSlider;

	use App\Models\HeroSlide;
	use Livewire\Component;

	class SlidesList extends Component
	{
		protected $listeners = [
			'slide-created' => '$refresh',
            'slide-updated' => '$refresh'
		];

		public function sortHeroSlidesOrder($sortOrder, $previousSortOrder, $name, $from, $to) {
			foreach ($sortOrder as $index => $id) {
				HeroSlide::where('id', $id)->update([
					'order' => $index
				]);
			}
		}

		public function toggleVisibility($id, $visibility) {
			HeroSlide::find($id)->update([
				'visible' => !$visibility
			]);
		}

		public function removeSlide($id) {
			HeroSlide::find($id)->delete();
		}

		public function render() {
			$slides = HeroSlide::all()->sortBy('order');
			return view('livewire.admin.pages.settings.widget.hero-slider.slides-list', [
				'slides' => $slides
			]);
		}
	}
