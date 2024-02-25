@extends('link.layout')
@section('bodyContent')
    <h3>{{$code}}  {{$message}}</h3>
    @foreach($data as $dataItem)
        <p>{{$dataItem}}</p>
    @endforeach
@endsection
