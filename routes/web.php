<?php

	use App\Http\Controllers\ProfileController;
	use Illuminate\Support\Facades\Route;

	// Guest
	Route::middleware('guest')->group(function () {
		Route::get('/', function () {
			return view('home');
		});
	});

	// Auth
	Route::middleware('auth')->group(function () {
		// Dashboard
		Route::get('/dashboard', function () {
			return view('dashboard');
		})->middleware([
			'auth',
			'verified'
		])->name('dashboard');
		// Profile
		Route::get('/profile', [
			ProfileController::class,
			'edit'
		])->name('profile.edit');
		Route::patch('/profile', [
			ProfileController::class,
			'update'
		])->name('profile.update');
		Route::delete('/profile', [
			ProfileController::class,
			'destroy'
		])->name('profile.destroy');
	});
	require __DIR__ . '/auth.php';
