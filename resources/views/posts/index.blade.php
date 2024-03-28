<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo</title>
</head>
<body>
    <h2>Lv.5</h2>
    <h1>毎日習慣化TODO</h1>
    <h2>並び替え</h2>

    @foreach($todos as $todo)

        <div>
            <p>〇　{{ $todo->title }}</p>
        </div>

    @endforeach
    
    <button>＋</button>

</body>
</html>