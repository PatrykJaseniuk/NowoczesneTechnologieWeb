@extends('app')

@section('wnetrze')
    <h1>login</h1>

    <form action="{{ $callBackLoginAction }}" method="post">
        {{ csrf_field() }}
        @foreach ($arguments as $nazwaArgumentu => $typ)
            <label for="{{ $nazwaArgumentu }}">{{ $nazwaArgumentu }}</label>
            <input type="{{ $typ }}" name="{{ $nazwaArgumentu }}">
        @endforeach
        <input type="submit" value="login">
    </form>
@endsection
