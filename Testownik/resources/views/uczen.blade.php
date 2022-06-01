@extends('app')

@section('wnetrze')
    <h1>Dane ucznia</h1>
    <table>
        @foreach ($daneUcznia as $nazwaDanej => $dana)
            <tr>
                <td>{{ $nazwaDanej }}</td>
                <td>{{ $dana }}</td>
            </tr>
        @endforeach
    </table>

    <h1>Dostepne quizy</h1>
    <table>
        @foreach ($dostepneQuizyZCallbackami as $quizZCallbackiem)
            @php
                $daneQuizu = $quizZCallbackiem['dane'];
            @endphp
            <tr>
                @foreach ($daneQuizu as $dana)
                    <td>{{ $dana }}</td>
                @endforeach
                <td><a href="{{ $quizZCallbackiem['callbackRozpocznijQuiz'] }}">rozpocznij</a></td>
            </tr>
        @endforeach
    </table>

    <h1>Rozwiazane testy</h1>
    <table>
        @isset($rozwiazaneQuizyZCallbackami[0]['dane'])
            <tr>
                @foreach ($rozwiazaneQuizyZCallbackami[0]['dane'] as $nazwaKolumny=>$value)
                    <td>{{ $nazwaKolumny }}</td>
                @endforeach
                <td>wynik</td>
            </tr>
        @endisset

        @foreach ($rozwiazaneQuizyZCallbackami as $quizZCallbackiem)
            <tr>
                @foreach ($quizZCallbackiem['dane'] as $dana)
                    <td>{{ $dana }}</td>
                @endforeach
                <td>{{ $quizZCallbackiem['wynik'] }}</td>
                <td><a href="{{ $quizZCallbackiem['callBackQuizWynik'] }}">sprawdz</a></td>
            </tr>
        @endforeach
    </table>
@endsection
