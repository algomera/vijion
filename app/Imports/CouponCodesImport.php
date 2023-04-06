<?php

	namespace App\Imports;

	use App\Models\CouponCode;
	use Maatwebsite\Excel\Concerns\ToModel;

	class CouponCodesImport implements ToModel
	{
		private $coupon_id;

		public function __construct($coupon_id) {
			$this->coupon_id = $coupon_id;
		}

		/**
		 * @param array $row
		 *
		 * @return \Illuminate\Database\Eloquent\Model|null
		 */
		public function model(array $row) {
			return new CouponCode([
				'coupon_id' => $this->coupon_id,
				'code'      => $row[0],
				'active'    => 1
			]);
		}
	}
