@extends('layout.app')

@section('wnetrze')
    <h1>edytuj {{ $nazwaEncji }}</h1>

    <form action="" method="post">
        @foreach (array_keys($encja) as $nazwaPola)
            <label for="">{{ $nazwaPola }}</label>
            <input type="text" value="{{ $encja[$nazwaPola] }}">
        @endforeach

        <input type="submit" value="">

    </form>
@endsection
