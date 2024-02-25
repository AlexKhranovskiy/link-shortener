@extends('link.layout')
@section('bodyContent')
    <h4>{{$code}}</h4>
    <h5>{{$message}}</h5>
    <ul>
        @foreach($data as $dataItem)
            <li>{{$dataItem}}</li>
        @endforeach
    </ul>
@endsection
