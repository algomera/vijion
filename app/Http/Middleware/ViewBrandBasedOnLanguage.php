<?php

namespace App\Http\Middleware;

use App\Models\Brand;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewBrandBasedOnLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $brand = Brand::where('slug', $request->brand)->first();
        $visibility = "visible_".app()->getLocale();
        if($brand->$visibility) {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
