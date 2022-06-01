@extends('app')

@section('wnetrze')

    <div class="gap-3">
        <div class="container p-5">
            <h1>tabela {{ $nazwaTabeli }}</h1>
            <table class="table">
                @foreach ($rekord as $nazwaPola => $wartosc)
                    <tr>
                        <th>{{ $nazwaPola }}</th>
                        <td>{{ $wartosc }}</td>
                    </tr>
                @endforeach
            </table>
            <a href="{{ $callBackUpdate }}">edytuj</a>
            <a href="{{ $callBackDelete }}">usun</a>
        </div>

        <div class="container p-5">
            <h2>powiazane tabele</h2>
            @foreach ($tabeleZwiazaneZCallBackami as $nazwaTabeli => $tabelaZCallBackiem)
                <div class="container p-5">
                    <h3>{{ $nazwaTabeli }}</h3>
                    <table class="table">
                        @php
                            $tabelaZCallBackami = $tabelaZCallBackiem['tabelaZCallBackami'];
                        @endphp
                        @isset($tabelaZCallBackami[0]['rekord'])
                            <thead>
                                @foreach ($tabelaZCallBackami[0]['rekord'] as $nazwaWiersza => $wartosc)
                                    <th>{{ $nazwaWiersza }}</th>
                                @endforeach
                            </thead>

                            <tbody>
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
                            </tbody>
                        @endisset
                    </table>
                    <a href="{{ $tabelaZCallBackiem['callBack'] }}">dodaj</a>
                </div>

        </div>

    </div>
    @endforeach
@endsection
