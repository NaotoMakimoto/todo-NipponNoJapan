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
    {{-- <h1>次のレベルまでXポイント</h1>
    <img src="{{ asset('img/naoto.png') }}" alt=""> --}}
    <h1>次のレベルまで<span id="points">X</span>ポイント</h1>
    <img id="image" src="" alt="">
    

    <script>
        // ポイントを取得する関数
        function getPoints() {
            fetch("{{ route('get.points') }}")
            .then(response => response.json())
            .then(data => {
                const points = data.points;
                document.getElementById("points").innerText = points;

                // ポイントに応じて画像を変更するロジックをここに実装
                if (points >= 100) {
                    document.getElementById("image").src = "{{ asset('img/naoto.png') }}";
                } else if (points >= 50) {
                    document.getElementById("image").src = "{{ asset('img/043.jpg') }}";
                } else {
                    document.getElementById("image").src = "{{ asset('img/044.jpg') }}";
                }
            });
        }

        // ページ読み込み時にポイントを取得する
        window.onload = getPoints;
    </script>

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