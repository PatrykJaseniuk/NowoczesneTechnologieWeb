@extends('app')

@section('wnetrze')
    <h1>create</h1>
    <h1>{{ $nazwaTabeli }}</h1>

    <form action="{{ $callBackCreateAction }}" method="post">
        {{ csrf_field() }}
        @foreach ($kolumny as $kolumna)
            <label for="{{ $kolumna }}">{{ $kolumna }}</label>
            <input type="text" name="{{ $kolumna }}" id="">
        @endforeach
        <input type="submit" value="zapisz">
    </form>
@endsection
