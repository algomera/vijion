<?php

	namespace App\Http\Livewire\Admin\Pages\Settings\Widget\HeroSlider;

	use App\Models\HeroSlide;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class CreateSlide extends ModalComponent
	{
		use WithFileUploads;

		public $paragraph;
		public $btn_text;
		public $btn_url;
		public $small_centered_text;
		public $big_centered_text;
		public $coins_centered_text;
		public $background_url;

		public static function modalMaxWidth(): string {
			return '5xl';
		}

		protected function rules() {
			return [
				'paragraph'           => 'required',
				'btn_text'            => 'required',
				'btn_url'             => 'required',
				'small_centered_text' => 'required',
				'big_centered_text'   => 'required',
				'coins_centered_text' => 'required',
				'background_url'      => $this->background_url ? 'image|max:1024' : 'nullable',
			];
		}

		public function create() {
			$this->validate();
			$uuid = Str::uuid();
			if ($this->background_url) {
				$filename = $this->background_url->getClientOriginalName();
				$ext = substr(strrchr($filename, '.'), 1);
				$bg_path = Storage::disk('public')->putFileAs('hero-slides', $this->background_url, Str::slug($uuid) . '.' . $ext);
			}

			HeroSlide::create([
				'paragraph'           => $this->paragraph,
				'btn_text'            => $this->btn_text,
				'btn_url'             => $this->btn_url,
				'small_centered_text' => $this->small_centered_text,
				'big_centered_text'   => $this->big_centered_text,
				'coins_centered_text' => $this->coins_centered_text,
				'background_url'      => $this->background_url ? $bg_path : null,
				'order'               => HeroSlide::count()
			]);
			$this->closeModal();
			$this->emit('slide-created');
		}

		public function render() {
			return view('livewire.admin.pages.settings.widget.hero-slider.create-slide');
		}
	}
