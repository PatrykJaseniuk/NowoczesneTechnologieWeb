@extends('layout.app')

@section('wnetrze')
    <div style="background-color: red">


        <h1>wnetrze</h1>
        <h3>{{ $nazwaTabeli }}</h3>
        <table>
            <thead>
                <tr>
                    @foreach (array_keys($tabela[0]) as $naglowek)
                        <th>
                            {{ $naglowek }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($tabela as $rekord)
                    <tr>
                        @foreach ($rekord as $komorka)
                            <td>{{ $komorka }}</td>
                        @endforeach
                        <td><a href="\{{ $scierzka }}\edytuj\{{ $rekord['id'] }}">edytuj</a></td>
                        <td><a href="\{{ $scierzka }}\usun\{{ $rekord['id'] }}">usun</a></td>
                    </tr>
                @endforeach
                <tr></tr>
            </tbody>
        </table>

        <a href="\{{ $scierzka }}\dodaj">dodaj</a>
    </div>
@endsection
