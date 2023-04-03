<?php

	use App\Http\Controllers\ProfileController;
	use App\Http\Livewire\Pages\Brand;
	use App\Http\Livewire\Pages\Cart;
	use App\Http\Livewire\Pages\Category;
	use App\Http\Livewire\Pages\Coupon;
	use App\Http\Livewire\Pages\Homepage;
	use App\Http\Livewire\Pages\Wallet;
	use Illuminate\Support\Facades\Route;

	// User Guest
	Route::get('/', Homepage::class)->name('home');
	Route::get('/coupon/{coupon:uuid}', Coupon::class)->name('coupon');
	Route::get('/cart', Cart::class)->name('cart');
	Route::get('/category/{category:slug}', Category::class)->name('category');
	Route::get('/brand/{brand:slug}', Brand::class)->name('brand');
	// User Auth
	Route::middleware('auth')->group(function () {
		// Wallet
		Route::get('/wallet', Wallet::class)->name('wallet');
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

	// Administrator
	Route::middleware(['auth', 'role:admin'])->group(function () {
		// Dashboard
		Route::get('/dashboard', function () {
			return view('dashboard');
		})->middleware([
			'verified'
		])->name('dashboard');
	});
	require __DIR__ . '/auth.php';
