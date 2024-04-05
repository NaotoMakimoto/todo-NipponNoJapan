<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- 他のヘッダー要素... -->
    <!-- JavaScriptの関数をここに配置 -->
    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // スムーズスクロールを有効にする
            });
        }

        function redirectToTodoIndex() {
            window.location.href = "{{ route('todo.index') }}";
        }
    </script>
    <style>
        .logo {
            cursor: pointer; /* マウスを持っていくとポインターに変わるようにする */
        }
    </style>
</head>

<body>

  <header class="">

    <img src="{{ asset('image/newlogo.png') }}" alt="Logo" class="logo" onclick="redirectToTodoIndex()">

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
</html>
