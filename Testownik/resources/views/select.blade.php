@extends('app')

@section('wnetrze')
    <h1>nazwa tabeli:{{ $nazwaTabeli2 }}</h1>
    <p>wybierz rekordy ktore sa powiazane z rekordem o id: {{ $id1 }} z tabeli: {{ $nazwaTabeli1 }} </p>

    <form action="{{ $callBackSelectAction }}" method="post">
        {{ csrf_field() }}
        <table>
            @foreach ($rekordy as $rekord)
                <tr>
                    <td>
                        <input type="checkbox" name="{{ $rekord['id'] }}" id="">
                    </td>
                    @foreach ($rekord as $komorka)
                        <td>{{ $komorka }}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>

        <input type="submit" value="zapisz">
    </form>
@endsection
