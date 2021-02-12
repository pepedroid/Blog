@extends('layouts.appPublic')
@section('title','Acerca de')

@section('head')
    @include('public.head')
@endsection

@section('navigation')
    @include('public.nav')
@endsection

@section('header')
    @include('public.header',["title"=>$title,"description"=>$description,"text"=>$text])
@endsection


@section('content')
    @include('public.about')
@endsection

@section('footer')
    @include('public.footer')
@endsection

@section('js')
    @include('public.js')
@endsection



