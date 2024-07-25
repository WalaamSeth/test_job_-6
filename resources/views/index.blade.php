@extends('layouts.app')

@section('content')
    <h1>Города</h1>
    <ul>
        @foreach($cities as $city)
            <li>
                <a href="{{ route('city.home', ['citySlug' => $city->slug]) }}"
                   @if($selectedCity && $selectedCity->id == $city->id) style="font-weight:bold;" @endif>
                    {{ $city->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
