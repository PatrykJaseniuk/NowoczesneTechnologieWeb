@extends('app')

@section('wnetrze')
    <h1>quiz wyniki</h1>

    <table>
        <tr>
            <td>Tresc Pytanie</td>
            <td>Prawidlowa Odpowiedz</td>
            <td>Udzielona Odpowiedz</td>
        </tr>
        @foreach ($pytaniaIOdpowiedzi as $pytanieIOdpowiedz)
            <tr>
                <td>{{ $pytanieIOdpowiedz['pytanie'] }}</td>
                <td>{{ $pytanieIOdpowiedz['prawidlowaOdpowiedz'] }}</td>
                <td>{{ $pytanieIOdpowiedz['udzielonaOdpowiedz'] }}</td>
            </tr>
        @endforeach
    </table>

    <h3>wynik</h3>
    <h3>{{ $wynik }} %</h3>
@endsection
