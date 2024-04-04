<body>
  <header class="">
    <p>
        {{ $user->name }}
        <span class="balloon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">→ log out</span>
    </p>

    <h2><a href="{{ route('level') }}">Lv.{{ $level }}</a></h2>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </header>
  @yield('content')
  <footer>
   
  </footer>
</body>

