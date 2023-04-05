<?php

	namespace Database\Seeders;

	use App\Models\Video;
	use Illuminate\Database\Console\Seeds\WithoutModelEvents;
	use Illuminate\Database\Seeder;

	class VideoSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 */
		public function run(): void {
			ini_set('memory_limit', -1);
			$currentPage = 1;
			$endPage = 100;
			$videos = [];
			while ($currentPage <= $endPage) {
				$request = http('get', env('TEYUTO_ENDPOINT') . 'videos?page=' . $currentPage);
				if ($request->successful()) {
					$videos = array_merge($videos, $request->json()['videos']);
					$currentPage++;
				} else {
					break;
				}
			}
			foreach ($videos as $video) {
				Video::updateOrCreate(['teyuto_id' => $video['id']], [
					'teyuto_id'   => $video['id'],
					'img_preview' => $video['img_preview'],
					'title'       => $video['title'],
					'duration'    => $video['duration']
				]);
			}
		}
	}
