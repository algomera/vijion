<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

	public function rules() {
		return $this->hasMany(Rules::class);
	}
	public function category() {
		return $this->belongsTo(Category::class);
	}

	public function coupons() {
		return $this->hasMany(Coupon::class);
	}
}
