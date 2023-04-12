<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\HeroSlider;

	use App\Models\HeroSlide;
	use LivewireUI\Modal\ModalComponent;

	class ShowSlide extends ModalComponent
	{
		public $slide;

		public static function modalMaxWidth(): string {
			return '7xl';
		}

		public function mount(HeroSlide $slide) {
			$this->slide = $slide;
		}

		public function render() {
			return view('livewire.admin.pages.settings.widget.hero-slider.show-slide');
		}
	}
