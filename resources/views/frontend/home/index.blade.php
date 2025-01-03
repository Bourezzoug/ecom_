@extends('layouts.frontend')
@section('content')
    @include('frontend.components.header')
    @include('frontend.components.alert')
    @include('frontend.home.components.heroSection')
    @include('frontend.home.components.shopNow')
    @include('frontend.home.components.vegetableProducts')
    @include('frontend.home.components.aboutUs')
    @include('frontend.home.components.offer')
    @include('frontend.home.components.fruitsProducts')
    @include('frontend.home.components.testimonials')
    @include('frontend.components.footer')
@endsection