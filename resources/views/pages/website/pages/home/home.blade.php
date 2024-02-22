@extends('pages.website.layouts.webapp')

@section('webcontent')
    @include('pages.website.pages.home.header')
    @include('pages.website.pages.home.moreabout')
    @include('pages.website.pages.home.service')
    @include('pages.website.pages.home.employees')
    @include('pages.website.pages.home.feedback')
    @include('pages.website.pages.home.beforefooter')
@endsection
