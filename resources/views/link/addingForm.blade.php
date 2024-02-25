@extends('link.layout')
@section('bodyContent')
    <form method="post" action="{{route('link.create')}}">
        @csrf
        <label for="inputLink">Enter the link:</label>
        <input id="inputLink" name="link" type="text"/><br/>
        @if($errors->has('link'))
            <div style="color: red">
                {{$errors->first('link')}}
            </div>
        @endif
        <input value="Create" type="submit">
    </form>
@endsection
