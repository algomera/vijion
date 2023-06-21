<?php

    namespace App\Http\Livewire;

    use App\Models\Brand;
    use App\Models\Category;
    use Illuminate\Support\Facades\Auth;
    use Livewire\Component;

    class Header extends Component
    {
        public $search;
        protected $listeners = [
            'changeLanguage',
            'user-status-updated' => '$refresh',
            'user-coins-updated' => '$refresh',
            'code-added' => '$refresh',
            'code-removed' => '$refresh'
        ];

        public function changeLanguage($code)
        {
            app()->setLocale($code);
            if(auth()->user()) {
                auth()->user()->update([
                    'lang' => $code
                ]);
            }
            session()->put('lang', $code);

            return redirect(request()->header('Referer'));
        }

        public function auth0login()
        {
            return redirect()->route('auth0.login');
        }

        public function logout()
        {
            Auth::logout();
            return redirect()->route('home');
        }

        public function render()
        {
            if ($this->search) {
                $search_results = Brand::where('name', 'like', '%' . $this->search . '%')->where("visible_" . app()->getLocale(), 1)->get();
            }
            return view('livewire.header', [
                'search_results' => $search_results ?? null,
                'categories' => Category::whereHas('brands.coupons', function ($coupons) {
                    $coupons->available();
                })->get()->take(6),
                'brands' => Brand::whereHas('coupons', function ($coupons) {
                    $coupons->available();
                })->where("visible_" . app()->getLocale(), 1)->orderByRaw('-our_brand_order DESC')->get()->take(6),
            ]);
        }
    }
