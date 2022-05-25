@extends('app')

@section('wnetrze')
    <h1>quiz</h1>

    <form action="{{ $callBackSprawdzQuiz }}" method="post">
        {{ csrf_field() }}
        @foreach ($pytania as $pytanie)
            <h2>{{ $pytanie['trescPytania'] }}</h2>

            @foreach ($pytanie['wariantyOdpowiedzi'] as $wariantOdpowiedzi)
                <input type="radio" id="{{ $pytanie['idPytania'] }}" name="{{ $pytanie['idPytania'] }}"
                    value="{{ $wariantOdpowiedzi }}">
                <label for="{{ $pytanie['idPytania'] }}">{{ $wariantOdpowiedzi }}</label><br>
            @endforeach
        @endforeach
        <input type="submit" value="zakoncz">
    </form>
@endsection
