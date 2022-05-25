<h1>naglowek</h1>
<ul>
    @foreach ($linki as $nazwa => $link)
        <li><a href="{{ $link }}">{{ $nazwa }}</a></li>
    @endforeach



    @if ($callBackLogout!=null)
 <h1>uzytkownik</h1>
    <h3>{{ $uzytkownik['nazwa'] }}</h3>
    <a href="{{ $callBackLogout }}">wyloguj</a>
    @endif




</ul>
<p>witam</p>
