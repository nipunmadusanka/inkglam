@extends('pages.website.layouts.webapp')

@section('webcontent')
    @include('pages.website.pages.appoinments.service')
    @include('pages.website.pages.appoinments.placeappoinment')
    @include('pages.website.pages.appoinments.ratinandrewies')
    @include('pages.website.pages.appoinments.comments')
@endsection
