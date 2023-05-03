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

	Route::middleware('api')->group(function() {
		Route::post('/register', function(Request $request) {
			$rules = [
				'first_name' => 'required',
				'last_name'  => 'required',
				'email'      => 'required|email|unique:users,email',
				'password'   => 'required|confirmed',
			];

			$validator = Validator::make($request->all(), $rules);

			if($validator->fails()) {
				return $validator->messages();
			} else {
				$user = User::create([
					'first_name' => $request->get('first_name'),
					'last_name'  => $request->get('last_name'),
					'email'      => $request->get('email'),
					'password'   => md5($request->get('password')),
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
