<?php

	namespace App\Http\Livewire\Admin\Pages\Brands;

	use App\Imports\CouponCodesImport;
	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;
	use Livewire\WithFileUploads;
	use Livewire\WithPagination;
	use Maatwebsite\Excel\Facades\Excel;

	class Coupon extends Component
	{
		use WithPagination, WithFileUploads;

		public \App\Models\Coupon $coupon;
		public $search;
		public $active = true;
		public $coupon_codes_file = null;
		protected $listeners = [
			'coupon-updated'     => '$refresh',
			'coupon-codes-added' => '$refresh'
		];

		public function couponCodesImport() {
			$filename = $this->coupon_codes_file->getClientOriginalName();
			$ext = substr(strrchr($filename, '.'), 1);
			$path = $this->coupon_codes_file->storeAs('coupon_codes/', $filename . '.' . $ext);
			Excel::import(new CouponCodesImport($this->coupon->id), $path);
			$this->coupon_codes_file = null;
			$this->emit('coupon-codes-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Import completato'),
				'subtitle' => __('I Codici sono stati aggiunti con successo!')
			]);
			Storage::deleteDirectory('coupon_codes');
		}

		public function render() {
			$codes = $this->coupon->codes()->active($this->active);
			if ($this->search) {
				$codes->where('code', 'like', '%' . $this->search . '%');
			}
			return view('livewire.admin.pages.brands.coupon', [
				'codes' => $codes->paginate(25)
			]);
		}
	}
