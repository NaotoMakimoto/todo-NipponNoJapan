<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Style for the progress meter */
        .progress-bar {
            width: 100%;
            background-color: #ddd;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        .progress {
            width: {{ $points }}%; /* Dynamically set the width based on the points */
            background-color: #4caf50;
            height: 20px;
            border-radius: 20px;
            text-align: center;
            line-height: 20px;
            color: white;
        }
    </style>
</head>
<body>
    <h1>モード選択</h1>
    <h1>次のレベルまで{{ $points }}ポイント</h1>

    <!-- Progress Meter -->
    <div class="progress-bar">
        <div class="progress">{{ $points }}%</div>
    </div>
   
    @if ($points >= 0 && $points < 50)
        <img src="{{ asset('img/naoto.png') }}" alt="">
    @elseif ($points >= 50 && $points < 100)
        <img src="{{ asset('img/043.jpg') }}" alt="">
    @else
        <img src="{{ asset('img/044.jpg') }}" alt="">
    @endif

    @foreach($todos as $todo)
    <a href="{{ route('todo.show', $todo->id) }}">
        <div>
            <p>〇　{{ $todo->title }}  {{ $todo->continuous }}日継続</p>
        </div>
    </a>
    @endforeach
    <a href="{{ route('todo.index') }}">戻る</a>
</body>
</html>
