<?php

namespace App\Http\Middleware;

use App\Models\Coupon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewCouponBasedOnLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $coupon = Coupon::where('uuid', $request->coupon)->first();
        $visibility = "visible_".app()->getLocale();
        if($coupon->brand->$visibility) {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
