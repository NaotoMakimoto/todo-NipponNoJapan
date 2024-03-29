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
{{-- 下記遷移先には飛ばさないのでコメントアウトです --}}
        {{-- <a href="{{ route('todo.show', $todo->id) }}"> --}}
            <div>
                <p>〇　{{ $todo->title }}</p>
            </div>
        </a>
    @endforeach
    
    <button>＋</button>

</body>
</html>