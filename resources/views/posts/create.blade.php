<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form id="todoForm" action="{{ route('post.store') }}" method="POST">
              @csrf
                <div class="form-group">
                    <label>新規TODO</label>
                    <input type="text" class="form-control" placeholder="新規TODOを入力して下さい" name="title">
                </div>
                <button type="submit" class="btn btn-primary">追加</button>
            </form>

            <div>
              <a href="{{ route('todo.index') }}">
                <button type="button" class="btn btn-primary">追加せずに戻る</button>
              </a>
            </div>

        </div>
    </div>
  </div>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> --}}

  <script>
    document.getElementById('todoForm').addEventListener('submit', function(event) {
        var titleInput = document.querySelector('input[name="title"]');
        if (!titleInput.value.trim()) {
            alert('新規TODOを記入してください');
            event.preventDefault(); // フォームの送信をキャンセル
        }
    });
  </script>

</body>
</html>