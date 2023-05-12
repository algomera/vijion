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
        /*
        {
            "event": "user_created",
            "object": {
                "id": "0123456789",
                "username": "test-username",
                "email": "test@email.com",
                "date": "2019-05-18T07:59:12+02:00",
                "language": "en",
                "location": {
                    "city": "city",
                    "country": "country",
                    "country_flag": "flag",
                    "country_code": "code"
                }
            },
            "datetime": "2023-05-04T08:49:49+02:00"
        }
         */
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
    Route::post('/coins-assignment', function (Request $request) {
        ini_set('memory_limit', -1);
        $currentPage = 1;
        $endPage = 100;
        $videos = [];
        while ($currentPage <= $endPage) {
            $request = http('get', env('TEYUTO_ENDPOINT') . 'analytics/views?date_start='. now()->format('Y-m-d') .'&page=' . $currentPage);
            // TODO: chiedere se possibile ricevere un 404 se la pagina non esiste (e quindi non ha dati all'interno)
            if ($request->successful()) {
                $check = array_filter($request->json(), function($key) {
                    return is_numeric($key);
                }, ARRAY_FILTER_USE_KEY);
                if($check) {
                    $videos = array_merge($videos, $check);
                    $currentPage++;
                }
                break;
            } else {
                break;
            }
        }
        // Seleziono solo gli elementi con una key numerica (escludo quindi status, page e next_page)
        $videos = array_filter($videos, function($key) {
            return is_numeric($key);
        }, ARRAY_FILTER_USE_KEY);

        foreach ($videos as $item) {
            $user = User::where('teyuto_id', $item['id_user'])->first();
            $video = Video::where('teyuto_id', $item['id_video'])->first();

            // Se l'utente ha visualizzato almeno un minuto di video
            if($item['total_seconds'] > 60) {
                $viewed_seconds = $item['total_seconds'];
                $viewed_minutes = floor($viewed_seconds / 60);
                $assigned_coins = $viewed_minutes * $video->coins;

                $user->increment('coins', $assigned_coins);
            }
        }
    });
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
