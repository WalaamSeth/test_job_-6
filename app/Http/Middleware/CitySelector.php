<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use App\Models\City;

class CitySelector
{

    public function handle(Request $request, Closure $next)
    {

       $citySlug = $request->route('citySlug');
        $city = City::where('slug', $citySlug)->first();
        if ($city) {
            session(['selected_city' => $city]);
        } elseif ($request->is('/')) {
            if ($selectedCity = session('selected_city')) {
               return redirect()->route('city.home', ['citySlug' => $selectedCity->slug], 301);
            }
        }

      return $next($request);
  }
}
