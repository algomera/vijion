<?php

	use App\Http\Controllers\ProfileController;
	use App\Http\Livewire\Admin\Pages\Brands\Coupon as CouponsShow;
	use App\Http\Livewire\Admin\Pages\Brands\Index as BrandsIndex;
	use App\Http\Livewire\Admin\Pages\Brands\Show as BrandsShow;
	use App\Http\Livewire\Admin\Pages\Categories\Index as CategoriesIndex;
	use App\Http\Livewire\Admin\Pages\Dashboard;
	use App\Http\Livewire\Admin\Pages\Users\Index as UsersIndex;
	use App\Http\Livewire\Admin\Pages\Users\Show as UsersShow;
	use App\Http\Livewire\Admin\Pages\Videos\Index as VideosIndex;
	use App\Http\Livewire\Pages\Brand;
	use App\Http\Livewire\Pages\Cart;
	use App\Http\Livewire\Pages\Category;
	use App\Http\Livewire\Pages\Coupon;
	use App\Http\Livewire\Admin\Pages\Settings\Homepage as SettingsHomepage;
	use App\Http\Livewire\Pages\Wallet;
	use Illuminate\Support\Facades\Route;

	// User Guest
	Route::get('/', \App\Http\Livewire\Pages\Homepage::class)->name('home');
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
	Route::middleware([
		'auth',
		'role:admin'
	])->group(function () {
		Route::get('/dashboard', Dashboard::class)->name('dashboard');
		Route::get('/settings/homepage', SettingsHomepage::class)->name('settings.homepage');
		Route::get('/users', UsersIndex::class)->name('users.index');
		Route::get('/users/{user}', UsersShow::class)->name('users.show');
		Route::get('/categories', CategoriesIndex::class)->name('categories.index');
		Route::get('/brands', BrandsIndex::class)->name('brands.index');
		Route::get('/brands/{brand:slug}', BrandsShow::class)->name('brands.show');
		Route::get('/brands/{brand:slug}/coupons/{coupon:uuid}', CouponsShow::class)->name('coupons.show');
		Route::get('/videos', VideosIndex::class)->name('videos.index');
	});
	require __DIR__ . '/auth.php';