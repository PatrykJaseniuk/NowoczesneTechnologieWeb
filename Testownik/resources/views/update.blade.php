@extends('app')

@section('wnetrze')
    <h1>update</h1>
    <h1>nazwa tabeli{{ $nazwaTabeli }}</h1>

    <form action="{{ $callBackUpdateAction }}" method="post">
        {{ csrf_field() }}
        @foreach ($rekord as $nazwaPola => $wartosc)
            @if ($nazwaPola == 'id')
                <input type="hidden" value="{{ $wartosc }}" name="{{ $nazwaPola }}">
            @else
                <label for="{{ $nazwaPola }}">{{ $nazwaPola }}</label>
                <input type="text" value="{{ $wartosc }}" name="{{ $nazwaPola }}">
            @endif
        @endforeach
        <input type="submit" value="update">
    </form>
@endsection
