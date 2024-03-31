<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
    <div>
      <h1>タスク編集</h1>
      <a href="{{ route('todo.index') }}">
        <button type="submit" class="btn btn-primary">戻る</button>
      </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('post.store') }}" method="POST">
              @csrf
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
                </div>
                <button type="submit" class="btn btn-primary">追加</button>
            </form>
        </div>
    </div>


    <div>
      
        <div>
         
            @foreach($todos as $todo)
              <form action="{{ route('posts.destroy', $todo->id) }}" method="POST" onsubmit="clickEvent(event)">
                @csrf
                @method('DELETE')
                  <input type="checkbox" name="selected_items[]" value="{{ $todo->id }}">
                  <label>{{ $todo->title }}</label><br>  
            @endforeach
                <button type="submit">選択した項目を削除</button>
              </form>
         
        </div>
    </div>
  </div>
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

