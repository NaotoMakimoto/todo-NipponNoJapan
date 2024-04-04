<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/create_style.css') }}">
</head>

@extends('layouts.app_original')
@section('content')
<body>

  <div class="create_container">
      <div class="create_container_top">
        <form action="{{ route('post.store') }}" method="POST">
          @csrf
            <div class="create_input">
                <input type="text" placeholder="タイトルを入力して下さい" name="title">
            </div>
            <button type="submit">add</button>
        </form>
        <hr>
      </div>
  
      <div class="create_container_bottom">
        @foreach($todos as $todo)
          <form action="{{ route('posts.destroy', $todo->id) }}" method="POST" onsubmit="clickEvent(event)">
            @csrf
            @method('DELETE')
            <div class="create_content">
              <input type="checkbox" name="selected_items[]" value="{{ $todo->id }}">
              <label>{{ $todo->title }}</label><br>  
            </div>
              
        @endforeach
            <button type="submit">delete</button>
          </form>
          <div class="back_button">
            <a href="{{ route('todo.index') }}">
              ← back to home
            </a>
          </div>
      </div>
      
      
    </div>
@endsection
 
  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

  <script>
      function clickEvent(event) {
        if (!window.confirm("本当に削除しますか？")) {
          event.preventDefault();
        }
      }
  </script>
</body>
</html>

