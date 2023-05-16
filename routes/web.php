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
	use App\Http\Livewire\Pages\Brands;
	use App\Http\Livewire\Pages\Cart;
	use App\Http\Livewire\Pages\Categories;
	use App\Http\Livewire\Pages\Category;
	use App\Http\Livewire\Pages\Coupon;
	use App\Http\Livewire\Admin\Pages\Settings\Homepage as SettingsHomepage;
	use App\Http\Livewire\Pages\Wallet;
	use App\Models\User;
	use App\Notifications\WelcomeEmailNotification;
	use Illuminate\Auth\Events\Registered;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Str;
    use Laravel\Socialite\Facades\Socialite;
	use Spatie\Permission\Models\Role;

	// User Guest
	Route::get('/', \App\Http\Livewire\Pages\Homepage::class)->name('home');
	Route::get('/coupon/{coupon:uuid}', Coupon::class)->name('coupon');
	Route::get('/cart', Cart::class)->name('cart');
	Route::get('/categories', Categories::class)->name('categories');
	Route::get('/category/{category:slug}', Category::class)->name('category');
	Route::get('/our-brands', Brands::class)->name('brands');
	Route::get('/brand/{brand:slug}', Brand::class)->name('brand');
	// Socialite
	Route::get('auth0/login', function () {
		return Socialite::driver('auth0')->redirect();
	})->name('auth0.login');
	Route::get('auth0/callback', function () {
		$result = Socialite::driver('auth0')->user();
        if(str_contains($result->id, 'google-oauth2')) {
            $provider = "google-oauth2";
        } elseif (str_contains($result->id, 'facebook')) {
            $provider = "facebook-oauth2";
        } elseif (str_contains($result->id, 'auth0')) {
            $provider = 'auth0';
        }
		$check = User::where('email', $result->email)->first();
		if (!$check) {
			$user = User::create([
				'provider'          => $provider,
				'provider_id'       => $result->user['sub'],
				'email'             => $result->email,
				'first_name'        => $result->user['given_name'] ?? $result->nickname,
				'last_name'         => $result->user['family_name'] ?? null,
				'email_verified_at' => now(),
				'password'          => null,
				'coins'             => 0
			]);
            $request = http('post', env('TEYUTO_ENDPOINT') . 'sessions/registration', [
                'email' => $user->email,
                'password' => Str::random(20)
            ]);
            if ($request->successful()) {
                $user->update([
                    'teyuto_id' => (int)$request->json()['id']
                ]);
            }
			$user->assignRole(Role::findByName('member'));
			event(new Registered($user));
			$user->notify(new WelcomeEmailNotification($user));
			Auth::login($user);
		} else {
			Auth::login($check);
		}
		return redirect()->route('home');
	});
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
	])->prefix('admin')->group(function () {
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
