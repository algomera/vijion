<?php

	use App\Http\Controllers\ProfileController;
	use App\Http\Livewire\Pages\Cart;
	use App\Http\Livewire\Pages\Coupon;
	use App\Http\Livewire\Pages\Homepage;
	use Illuminate\Support\Facades\Route;

	// Guest
	Route::get('/', Homepage::class)->name('home');
	Route::get('/coupon/{coupon}', Coupon::class)->name('coupon');
	Route::get('/cart', Cart::class)->name('cart');

	// Auth
	Route::middleware('auth')->group(function () {
		// Dashboard
		Route::get('/dashboard', function () {
			return view('dashboard');
		})->middleware([
			'verified'
		])->name('dashboard');
		// Coupon
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
