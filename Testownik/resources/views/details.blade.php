@extends('app')

@section('wnetrze')
    <h1>tabela {{ $nazwaTabeli }}</h1>

    <table>
        @foreach ($rekord as $nazwaPola => $wartosc)
            <tr>
                <td>{{ $nazwaPola }}</td>
                <td>{{ $wartosc }}</td>
            </tr>
        @endforeach
    </table>

    <a href="{{ $callBackUpdate }}">edytuj</a>
    <a href="{{ $callBackDelete }}">usun</a>

    <h2>powiazane tabele</h2>

    @foreach ($tabeleZwiazaneZCallBackami as $nazwaTabeli => $tabelaZCallBackiem)
        <h3>{{ $nazwaTabeli }}</h3>
        <table>
            @php
                $tabelaZCallBackami = $tabelaZCallBackiem['tabelaZCallBackami'];
            @endphp
            @isset($tabelaZCallBackami[0]['rekord'])
                <tr>
                    @foreach ($tabelaZCallBackami[0]['rekord'] as $nazwaWiersza => $wartosc)
                        <td>{{ $nazwaWiersza }}</td>
                    @endforeach
                </tr>
                @foreach ($tabelaZCallBackami as $rekordZCallBackiem)
                    @php
                        $rekord = $rekordZCallBackiem['rekord'];
                        $callBack = $rekordZCallBackiem['callBack'];
                    @endphp
                    <tr>
                        @foreach ($rekord as $komorka)
                            <td>{{ $komorka }}</td>
                            {{-- <p>{{ http_build_query($komorka, '', ', ') }}</p> --}}

                        @endforeach

                        <td> <a href="{{ $callBack }}">odlacz</a>
                        </td>
                    </tr>
                @endforeach
            @endisset
        </table>

        <a href="{{ $tabelaZCallBackiem['callBack'] }}">dodaj</a>
    @endforeach
@endsection
