{{-- <body>
  <header class="">

    <p onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ $user->name }}
      </p>
    <h2><a href="{{ route('level') }}">Lv.{{ $level }}</a></h2>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </header>
  
  @yield('content')
  <footer>
   
  </footer>
</body> --}}


<body>

  <header class="">
    <img src="{{ asset('image/newlogo.png') }}" alt="Logo" class="logo">

    <p onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      {{ $user->name }}
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


