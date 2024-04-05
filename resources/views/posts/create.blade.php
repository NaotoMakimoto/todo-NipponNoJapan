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
        <form action="{{ route('post.store') }}" method="POST" onsubmit="return validateForm()">
          @csrf
            <div class="create_input">
                <input type="text" placeholder=" TODOを入力して下さい" name="title" id="todo_title">
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
  
<script>

  function validateForm() {
    var todoTitle = document.getElementById('todo_title').value;
    if (todoTitle.trim() === '') {
      alert('TODOを入力してください。');
      return false; // フォーム送信をキャンセル
    }
    return true; // フォーム送信を許可
  }

  function clickEvent(event) {
    if (!window.confirm("本当に削除しますか？")) {
      event.preventDefault();
    }
  }
</script>
</body>
</html>
