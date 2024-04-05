<body>
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
  

<button id="playButton">Play Sound</button>

<audio id="levelUpSound" src="/audio/hiro.mp4" preload="auto"></audio>

<script>
    document.getElementById('playButton').addEventListener('click', function() {
        playLevelUpSound();
    });

    function playLevelUpSound() {
        var audio = document.getElementById('levelUpSound');
        audio.play();
    }
</script>


</body>

