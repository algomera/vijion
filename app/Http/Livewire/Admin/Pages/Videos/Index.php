<?php

	namespace App\Http\Livewire\Admin\Pages\Videos;

	use App\Models\Video;
	use Database\Seeders\VideoSeeder;
	use Livewire\Component;
	use Livewire\WithPagination;

	class Index extends Component
	{
		use WithPagination;
		public $search;

		protected $listeners = [
			'video-updated' => '$refresh'
		];

		public function sync() {
			ini_set('memory_limit', -1);
			ini_set('max_execution_time', 0);
			try {
				$video_seeder = new VideoSeeder();
				$video_seeder->run();
			} catch (\Exception $exception) {
				$this->dispatchBrowserEvent('open-notification', [
					'title'    => 'Errore',
					'subtitle' => 'Non è stato possibile sincronizzare i video, riprovare.',
					'type'     => 'error',
				]);
			}
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => 'Sincronizzazione conclusa',
				'subtitle' => 'La sincronizzazione è avvenuta con successo!',
				'type'     => 'success',
			]);
		}
		public function render() {
			$videos = Video::query();
			if ($this->search) {
				$videos->where('title', 'like', '%' . $this->search . '%');
			}
			return view('livewire.admin.pages.videos.index', [
				'videos' => $videos->paginate(25)
			]);
		}
	}
