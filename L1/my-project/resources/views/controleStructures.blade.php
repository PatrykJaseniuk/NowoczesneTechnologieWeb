<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1></h1>
    <h1> witam panstwa{{ $parametr }}</h1>
    {{-- kazda struktura kontrolna sklada sie z:
@[nazwa]
[cialo]
@end[nazwa] --}}
    @if (5 < 10)
        <h1> 5 to mniej niz 10</h1>
    @else
        <h1> 5 nie jest mniej niz 10</h1>
    @endif

    <div style="background-color: red">
        <h1>sprawdzanie czy znienna istnieje/ czy nie jest nullem</h1>
        @unless(empty($parametr))
            <h1>warotsc parametu u strukturze 'unless': {{ $parametr }}</h1>
        @endunless

        @if (!empty($parametr))
            <h1>wartosc paremetru w strukturze 'if': {{ $parametr }}</h1>
        @endif

        @empty(!$parametr)
            <h1>wartosc parametru w strukturze 'empty': {{ $parametr }}</h1>
        @endempty

        @isset($parametr)
            <h1>wartosc parametru w strukturze 'isset': {{ $parametr }}</h1>
        @endisset
    </div>

    <div style=" background-color: green">
        <h1>switch structure</h1>
        @switch($parametr)
            @case('f16')
                <img src="{{ URL('img/f-16.jpg') }}" alt="">
            @break

            @case('f22')
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/F-22_Raptor_-_100702-F-4815G-217.jpg" alt="">
            @break

            @case('f35')
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/A_U.S._Air_Force_pilot_navigates_an_F-35A_Lightning_II_aircraft_assigned_to_the_58th_Fighter_Squadron%2C_33rd_Fighter_Wing_into_position_to_refuel_with_a_KC-135_Stratotanker_assigned_to_the_336th_Air_Refueling_130516-F-XL333-454.jpg/800px-thumbnail.jpg"
                    alt="">
            @break

            @default
        @endswitch
    </div>

    <div style="background-color: blue">
        <h1>loops</h1>

        <h3>petla for</h3>
        @for ($i = 0; $i < 10; $i++)
            <h6> i jest rowne: {{ $i }}</h6>
        @endfor

        <h3>petla foreach</h3>
        @foreach ($samoloty as $samolot)
            <h6>samolot: {{ $samolot }}</h6>
        @endforeach

        <h3>petla while</h3>
        @php
            $i = 0;
        @endphp
        @while ($i < 10)
            <h6> i jest rowne: {{ $i++ }} </h6>
        @endwhile



    </div>


</body>

</html>
