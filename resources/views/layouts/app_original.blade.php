<body>
  <header class="">
    <h2><a href="{{ route('level') }}">Lv.{{ $level }}</a></h2>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      ログアウト
    </a>
  </header>
  @yield('content')
  <footer>
   
  </footer>
</body>

