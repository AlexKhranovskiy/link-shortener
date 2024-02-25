@extends('link.layout')
@section('bodyContent')
    <h3>Short link not found</h3>
    <p>The short link "{{asset($shortLink)}}" has not been found.</p>
@endsection
