<?php

	use App\Models\User;
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
				'id'       => 'required',
				'username' => 'required',
				'email'    => 'required|email|unique:users,email'
			];
			$validator = Validator::make($request->get('object'), $rules);
			if ($validator->fails()) {
				return $validator->messages();
			} else {
				$user = User::create([
					'teyuto_id'  => $request->get('object')['id'],
					'first_name' => $request->get('object')['username'],
					'last_name'  => null,
					'email'      => $request->get('object')['email'],
					'password'   => bcrypt(\Illuminate\Support\Str::password(10, true, true, false)),
					'coins'      => 0,
				]);
				$user->assignRole(Role::findByName('member'));
				return "User Registered";
			}
		});
	});
	Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
		return $request->user();
	});
