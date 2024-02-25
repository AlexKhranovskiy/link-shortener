@extends('link.layout')
@section('bodyContent')
    <h3>Your link:</h3>
    <p><a href="{{$originalLink}}">{{$originalLink}}</a></p>
    <h3>Your short link:</h3>
    <p><a href="{{asset($shortLink)}}">{{asset($shortLink)}}</a></p>
@endsection
