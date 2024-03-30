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
    <h2><a href="{{ route('level') }}">Lv.5</a></h2>
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

    <div>
        <a href="{{ route('posts.crete') }}">
            <button>新規タスク追加</button>
        </a>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        let touchStartX = 0;
        let touchEndX = 0;
    
        let hiddenTodos = {};
    
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
                    element.style.display = 'none'; 
                    hiddenTodos[id] = true; 
                    localStorage.setItem('hiddenTodos', JSON.stringify(hiddenTodos)); 
                    incrementPoint(id); 
                }, { once: true });
            }
        }
    
        function incrementPoint(id) {
            // CSRFトークンの取得
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            // ポイントと連続値をインクリメントするためのfetchリクエスト
            fetch('/todo/' + id, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
                // continuousも1増やすためにbodyに含めます
                body: JSON.stringify({ 'point': 1, 'continuous': 1 })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
        
        function resetContinuous(id) {
    // CSRFトークンの取得
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // 連続値をリセットするためのfetchリクエスト
    fetch('/todo/reset/' + id, { // エンドポイントは適宜変更してください
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 'continuous': 0 })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

        function revealTodosAtSpecificTime() {
            const revealTime = new Date();
            revealTime.setHours(10, 3, 30, 0); // 次の表示時刻を設定

            if (new Date() > revealTime) {
                revealTime.setDate(revealTime.getDate() + 1); // 現在が指定時刻を過ぎていたら翌日に設定
            }

            const msUntilReveal = revealTime - new Date();

            setTimeout(() => {
                const todosToResetContinuous = [];
                document.querySelectorAll('.todo-item').forEach(item => {
                    const id = item.getAttribute('id').split('-')[1];
                    if (hiddenTodos[id]) {
                        item.style.display = ''; // 元の表示スタイルに戻す
                        item.classList.remove('swipe-out-right'); // アニメーションクラスを削除
                        delete hiddenTodos[id]; // オブジェクトから削除
                    } else {
                        // 非表示になっていないTodoは、continuousをリセットするためのリストに追加
                        todosToResetContinuous.push(id);
                    }
                });

                // continuousの値をリセット
                todosToResetContinuous.forEach(resetContinuous);

                localStorage.setItem('hiddenTodos', JSON.stringify(hiddenTodos)); // 変更をローカルストレージに保存
            }, msUntilReveal);
        }
    
        document.addEventListener('DOMContentLoaded', () => {
            hiddenTodos = JSON.parse(localStorage.getItem('hiddenTodos') || '{}');
            revealTodosAtSpecificTime();
            
            // ページ読み込み時に非表示状態を復元
            document.querySelectorAll('.todo-item').forEach(item => {
                const id = item.getAttribute('id').split('-')[1];
                if (hiddenTodos[id]) {
                    item.style.display = 'none'; // 非表示にする
                }
            });
        });
    </script>
    
</body>
</html>



