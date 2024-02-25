@extends('link.layout')
@section('bodyContent')
    <h4>Short link not found</h4>
    <p>The short link "{{asset($shortLink)}}" has not been found.</p>
@endsection
