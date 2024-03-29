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

  <script>
    document.getElementById('todoForm').addEventListener('submit', function(event) {
        var titleInput = document.querySelector('input[name="title"]');
  
        var titleValue = titleInput.value.trim();

        if (!titleInput.value.trim()) {
            alert('新規TODOを記入してください');
            event.preventDefault(); 
        }
    });
  </script>

</body>
</html>