<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h2>Lv.5</h2>
    <h1>毎日習慣化TODO</h1>
    <h2>並び替え</h2>
    @foreach($todos as $todo)
     <div id="todo-{{ $todo->id }}" class="todo-item"
        ontouchstart="handleTouchStart(event)"
        ontouchmove="handleTouchMove(event)"
        ontouchend="handleTouchEnd(event, {{ $todo->id }})">
        <p>{{ $todo->title }}</p>
     </div>
    @endforeach

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        // タッチ開始位置
        let touchStartX = 0;
        // タッチ終了位置
        let touchEndX = 0;

        function handleTouchStart(event) {
            touchStartX = event.changedTouches[0].screenX;
        }

        function handleTouchMove(event) {
            touchEndX = event.changedTouches[0].screenX;
        }

        function handleTouchEnd(event, id) {
            // スワイプの検出（左から右へのスワイプを検出）
            if (touchEndX > touchStartX) {
                // アニメーションを追加する要素を取得
                var element = document.getElementById("todo-" + id);
                // アニメーションを適用
                element.classList.add('swipe-out-right');
                // アニメーションが終わった後にポイントをインクリメントする
                element.addEventListener('animationend', function() {
                    incrementPoint(id);
                }, { once: true });
            }
        }

        // CSRFトークンの取得
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function incrementPoint(id) {
            fetch('/todo/' + id, {
                method: 'PUT', // PUTメソッドを使用する
                headers: {
                    'X-CSRF-TOKEN': csrfToken, // CSRFトークンをヘッダーに含める
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 'point': 1 }) // pointをインクリメント
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data); // レスポンスの成功をコンソールに表示
            })
            .catch((error) => {
                console.error('Error:', error); // エラーをコンソールに表示
            });
        }
    </script>
</body>
</html>
