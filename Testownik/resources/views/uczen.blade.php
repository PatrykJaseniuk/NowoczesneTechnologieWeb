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
        @foreach ($rozwiazaneQuizyZCallbackami as $quizZCallbackiem)
            @php
                $daneQuizu = $quizZCallbackiem['dane'];
            @endphp
            <tr>
                @foreach ($daneQuizu as $dana)
                    <td>{{ $dana }}</td>
                @endforeach
                <td><a href="{{ $quizZCallbackiem['callBackQuizWyniki'] }}">sprawdz</a></td>
            </tr>
        @endforeach
    </table>
@endsection
