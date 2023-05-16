<?php

    use App\Models\User;
    use App\Models\Video;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Validator;
    use Spatie\Permission\Models\Role;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "api" middleware group. Make something great!
    |
    */
    Route::middleware('api')->group(function () {
        Route::post('/register', function (Request $request) {
            $rules = [
                'id' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:users,email',
            ];
            $validator = Validator::make($request->get('object'), $rules);
            if ($validator->fails()) {
                return $validator->messages();
            } else {
                $user = User::updateOrCreate([
                    'email' => $request->get('object')['email']
                ], [
                    'teyuto_id' => $request->get('object')['id'],
                    'first_name' => $request->get('object')['username'],
                    'last_name' => null,
                    'email' => $request->get('object')['email'],
                    'coins' => 0,
                ]);
                $user->assignRole(Role::findByName('member'));
                return "User Registered";
            }
        });
    });
    // Assegnazione Coins
    Route::post('/coins-assignment', function () {
        ini_set('memory_limit', -1);
        $currentPage = 1;
        $endPage = 100;
        $videos = [];
        while ($currentPage <= $endPage) {
            $request = http('get', env('TEYUTO_ENDPOINT') . 'analytics/views?date_start='. now()->format('Y-m-d') .'&page=' . $currentPage);
            if ($request->successful()) {
                $videos = array_merge($videos, $request->json()['views']);
                $currentPage++;
            } else {
                break;
            }
        }

        foreach ($videos as $item) {
            $user = User::where('teyuto_id', $item['id_user'])->first();
            $video = Video::where('teyuto_id', $item['id_video'])->first();
            if($user && $video) {
                // Se l'utente ha visualizzato almeno un minuto di video
                if ($item['total_seconds'] >= 60) {
                    $viewed_seconds = $item['total_seconds'];
                    $viewed_minutes = floor($viewed_seconds / 60);
                    $assigned_coins = $viewed_minutes * $video->coins;

                    $user->increment('coins', $assigned_coins);
                }
            }
        }
    });
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
