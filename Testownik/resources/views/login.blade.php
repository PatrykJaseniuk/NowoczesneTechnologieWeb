@extends('app')

@section('wnetrze')
    <div class="container-lg">

        <form action="{{ $callBackLoginAction }}" method="post">
            {{ csrf_field() }}
            <div class="mb-3">
                @foreach ($arguments as $nazwaArgumentu => $typ)
                    <label for="{{ $nazwaArgumentu }}">{{ $nazwaArgumentu }}</label>
                    <input class="form-control" type="{{ $typ }}" name="{{ $nazwaArgumentu }}">
                @endforeach
            </div>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="login">
        </form>

    </div>
@endsection
