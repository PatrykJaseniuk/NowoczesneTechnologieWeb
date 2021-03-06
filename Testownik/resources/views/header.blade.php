{{-- <h1>naglowek</h1>
<ul>




    @if ($callBackLogout != null)
        <h1>uzytkownik</h1>
        <h3>{{ $uzytkownik['nazwa'] }}</h3>
        <a href="{{ $callBackLogout }}">wyloguj</a>
    @endif
</ul>
<p>witam</p> --}}

<header
    class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
        </svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        @foreach ($linki as $nazwa => $link)
            <li><a href="{{ $link }}" class="nav-link px-2 link-dark">{{ $nazwa }}</a></li>
        @endforeach
    </ul>

    <div class="col-md-3 text-end">
        @if ($callBackLogout != null)
        <p>{{ $uzytkownik->imie }}</p>
        <a href="{{ $callBackLogout }}" class="btn btn-outline-primary me-2">wyloguj</a>
    @endif
        {{-- <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button> --}}
    </div>
</header>
