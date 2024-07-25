<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class PageController extends Controller
{
    public function index(Request $request, $citySlug = null)
    {

        $cities = City::all();
        $selectedCity = null;

        if ($citySlug) {
            $selectedCity = City::where('slug', $citySlug)->first();
        }

        if ($selectedCity) {
            session(['selected_city' => $selectedCity]);
        }

        return view('index', compact('cities', 'selectedCity'));
    }

    public function about(Request $request, $citySlug = null)
    {
        $selectedCity = City::where('slug', $citySlug)->first() ?? session('selected_city');

        return view('about', compact('selectedCity'));
    }

    public function news(Request $request, $citySlug = null)
    {
        $selectedCity = City::where('slug', $citySlug)->first() ?? session('selected_city');

        return view('news', compact('selectedCity'));
    }
}
