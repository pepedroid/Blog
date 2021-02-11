@extends('layouts.appPublic')

@section('js')
    @extends('public.js')
@endsection

@section('footer')
    @extends('public.footer')
@endsection

@section('content')
    @extends('public.about')
@endsection


@section('navigation')
    @extends('public.nav')
@endsection

@section('head')
    @extends('public.head')
@endsection



@section('header')
    @extends('public.header',["title"=>$title,"description"=>$description,"text"=>$text])
@endsection

@section('title','Acerca de')






