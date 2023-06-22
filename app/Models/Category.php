<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, MultiLanguage;

    protected $multi_lang = [
        'name'
    ];

	public function brands() {
		return $this->hasMany(Brand::class);
	}
}
