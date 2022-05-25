@extends('app')

@section('wnetrze')
    <h1>{{ $nazwaTabeli }}</h1>

    <table>
        <thead>
            @foreach ($kolumny as $kolumna)
                <th>{{ $kolumna }}</th>
            @endforeach
        </thead>
        <tbody>
            @foreach ($rekordyZCallbackami as $rekordZCallbackiem)
                @php
                    $rekord = $rekordZCallbackiem['rekord'];
                    $callBack = $rekordZCallbackiem['callBack'];
                @endphp
                <tr>
                    @foreach ($rekord as $komorka)
                        <td>{{ $komorka }}</td>
                    @endforeach
                    <td><a href="{{ $callBack }}">szczegoly</a></td>

                </tr>
            @endforeach
        </tbody>

    </table>

    <a href="{{ $callBackCreate }}">dodaj</a>
@endsection
