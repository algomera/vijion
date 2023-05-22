<?php

    use App\Models\User;
    use App\Models\Video;
    use Illuminate\Support\Facades\Artisan;

    // Assegnazione Coins agli utenti che hanno visualizzato dei video
    Artisan::command('coins:allocate', function () {
        ini_set('memory_limit', -1);
        $currentPage = 1;
        $endPage = 100;
        $videos = [];
        while ($currentPage <= $endPage) {
            $request = http('get', env('TEYUTO_ENDPOINT') . 'analytics/views?date_start=' . now()->subDay()->format('Y-m-d') . '&page=' . $currentPage);
            if ($request->successful()) {
                $videos = array_merge($videos, $request->json()['views']);
                $currentPage++;
            } else {
                break;
            }
        }
        if ($videos) {
            foreach ($videos as $item) {
                $user = User::where('teyuto_id', $item['id_user'])->first();
                $video = Video::where('teyuto_id', $item['id_video'])->first();
                if ($user && $video) {
                    // Se l'utente ha visualizzato almeno un minuto di video
                    if ($item['total_seconds'] >= 60) {
                        $viewed_seconds = $item['total_seconds'];
                        $viewed_minutes = floor($viewed_seconds / 60);
                        $assigned_coins = $viewed_minutes * $video->coins;

                        $user->increment('coins', $assigned_coins);
                    }
                }
            }
            echo "Coins allocated successfully.";
        } else {
            echo "No coins to allocate.";
        }
    });
