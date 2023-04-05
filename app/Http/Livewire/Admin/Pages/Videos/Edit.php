<?php

	namespace App\Http\Livewire\Admin\Pages\Videos;

	use App\Models\Video;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		public $video;

		protected $rules = [
			'video.coins' => 'numeric|min:0'
		];
		public function mount(Video $video) {
			$this->video = $video;
		}

		public function save() {
			$this->validate();

			$this->video->save();
			$this->closeModal();
			$this->emit('video-updated');
		}
		public function render() {
			return view('livewire.admin.pages.videos.edit');
		}
	}
