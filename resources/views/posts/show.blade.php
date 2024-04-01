<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- <style>
        .card-img-top {
            object-fit: cover;
            height: 100%; /* 画像の高さを調整 */
            width: 100%; 
        }
    </style>

    <style>
        .custom-card {
            /* カードの幅を調整 */
            width: 25rem;
            height: 50rem; 
            /* height: auto;  */
        }
    </style> --}}

    <style>
        .custom-card {
            /* カードの幅を調整 */
            width: 20rem;
            height: 30rem; /* 仮の高さ。画像のアスペクト比を維持するために設定 */
            display: flex; /* 子要素を縦方向に配置するために flex を使用 */
            justify-content: center; /* 子要素を中央に配置 */
            align-items: center; /* 子要素を中央に配置 */
        }
    
        .card-img-container {
            /* 画像をカードの中央に配置し、オーバーフローした部分を隠す */
            overflow: hidden;
            width: 100%; /* 画像を親要素に合わせる */
            height: 100%; /* 画像を親要素に合わせる */
        }
    
        .card-img-top {
            object-fit: cover; /* 画像を維持しながら親要素にフィットさせる */
            width: 100%; /* 画像を親要素に合わせる */
            height: 100%; /* 画像を親要素に合わせる */
        }

        .postimg{
            width: 20rem;
            height: 20rem; 
        }
    </style>
    

</head>
<body>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1>日々のTODOを記録</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit" class="btn btn-primary">アップロード</button>
    </form>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($bonuses as $bonus)
        <div class="col">
            <div class="card custom-card"> <!-- カード自体のクラスに custom-card を追加 -->
                <div class='postimg'>
                    <img src="{{ asset('storage/img/' . $bonus->image) }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">写真投稿日: {{ $bonus->created_at }}</h5>
                    <a href="#" class="btn btn-primary">トップへ戻る</a>
                    <form action="{{ route('bonus.destroy', $bonus->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <form action="{{ route('todo.index') }}" method="GET">
        <button type="submit" class="btn btn-primary">戻る</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>