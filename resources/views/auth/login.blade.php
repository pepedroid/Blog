@extends('layouts.app',["img"=>$img,"title"=>$title,"description"=>$description])


@section('content')
    <login-form-component></login-form-component>

@endsection

@section('footer')
    @include('public.footer')
@endsection


