<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Coupon extends Model
    {
        use HasFactory;

        protected $casts = [
            'expires_date' => 'date:Y-m-d',
        ];

        public function scopeAvailable(Builder $query)
        {
            $query->where('active', true)
                ->where(function ($query) {
                    $query->whereDate('expires_date', '>', now())
                        ->orWhereNull('expires_date');
                });
        }

        public function brand()
        {
            return $this->belongsTo(Brand::class);
        }

        public function codes()
        {
            return $this->hasMany(CouponCode::class);
        }
    }
