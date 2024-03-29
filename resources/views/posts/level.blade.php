<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>モード選択</h1>
    <h1>次のレベルまでXポイント</h1>
    <img src="{{ asset('img/naoto.png') }}" alt="">
    
    
    @foreach($todos as $todo)
        <a href="{{ route('todo.show', $todo->id) }}">
            <div>
                <p>〇　{{ $todo->title }}</p>
            </div>
        </a>
    @endforeach

    <a href="{{ route('todo.index') }}">戻る</a>
</body>
</html>