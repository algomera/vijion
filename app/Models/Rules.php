<?php

	namespace App\Models;

	use App\Traits\MultiLanguage;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Rules extends Model
	{
		use HasFactory, MultiLanguage;

        protected $multi_lang = [
            'body'
        ];

		public function brand() {
			return $this->belongsTo(Brand::class);
		}
	}
