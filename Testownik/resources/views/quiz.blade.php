@extends('app')

@section('wnetrze')
    <h1>quiz</h1>

    <form action="{{ $callBackSprawdzQuiz }}" method="post">
        {{ csrf_field() }}
        @foreach ($pytania as $pytanie)
            <h2>{{ $pytanie['tresc'] }}</h2>

            {{-- @foreach ($pytanie['wariantyOdpowiedzi'] as $wariantOdpowiedzi)
                <input type="radio" id="{{ $pytanie['id'] }}" name="{{ $pytanie['id'] }}"
                    value="{{ $wariantOdpowiedzi }}">
                <label for="{{ $pytanie['id'] }}">{{ $wariantOdpowiedzi }}</label><br>
            @endforeach --}}
            <input type="radio" id="{{ $pytanie['id'] }}" name="{{ $pytanie['id'] }}"
                value="{{ $pytanie['odpowiedz_a'] }}">
            <label for="{{ $pytanie['id'] }}">{{ $pytanie['odpowiedz_a'] }}</label><br>

            <input type="radio" id="{{ $pytanie['id'] }}" name="{{ $pytanie['id'] }}"
                value="{{ $pytanie['odpowiedz_b'] }}">
            <label for="{{ $pytanie['id'] }}">{{ $pytanie['odpowiedz_b'] }}</label><br>

            <input type="radio" id="{{ $pytanie['id'] }}" name="{{ $pytanie['id'] }}"
                value="{{ $pytanie['odpowiedz_c'] }}">
            <label for="{{ $pytanie['id'] }}">{{ $pytanie['odpowiedz_c'] }}</label><br>

            <input type="radio" id="{{ $pytanie['id'] }}" name="{{ $pytanie['id'] }}"
                value="{{ $pytanie['odpowiedz_d'] }}">
            <label for="{{ $pytanie['id'] }}">{{ $pytanie['odpowiedz_d'] }}</label><br>
        @endforeach
        <input type="submit" value="zakoncz">
    </form>
@endsection
