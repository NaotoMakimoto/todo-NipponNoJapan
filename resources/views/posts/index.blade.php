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
        // タッチ開始位置とタッチ終了位置の定義
        let touchStartX = 0;
        let touchEndX = 0;
    
        function handleTouchStart(event) {
            touchStartX = event.changedTouches[0].screenX;
        }

        function handleTouchMove(event) {
            touchEndX = event.changedTouches[0].screenX;
        }

        function handleTouchEnd(event, id) {
    if (touchEndX > touchStartX) {
        var element = document.getElementById("todo-" + id);
        element.classList.add('swipe-out-right');
        
        element.addEventListener('animationend', function() {
            element.style.display = 'none'; // アニメーションが完了したら要素を非表示にする

            // 3秒後に再表示する
            setTimeout(() => {
                element.style.display = ''; // 元の表示スタイルに戻す
                element.style.opacity = ''; // 透明度をリセット
                element.classList.remove('swipe-out-right'); // アニメーションクラスを削除
            }, 3000);

            incrementPoint(id); // ポイントをインクリメントする関数を呼び出し
        }, { once: true });
    }
}


        function incrementPoint(id) {
            // CSRFトークンの取得
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // ポイントをインクリメントするためのfetchリクエスト
            fetch('/todo/' + id, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 'point': 1 })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
