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
    <h1>次のレベルまで{{ $points }}ポイント</h1>
    
    {{-- 0〜49ポイントの場合 --}}
    @if ($points >= 0 && $points < 50)
        <img src="{{ asset('img/1st_image.png') }}" alt="">
    
    {{-- 50以上99以下の場合 --}}
    @elseif ($points >= 50 && $points < 100)
        <img src="{{ asset('img/2nd_image.png') }}" alt="">
    
    {{-- 100以上の場合 --}}
    @else
        <img src="{{ asset('img/3rd_image.png') }}" alt="">
    @endif
    

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