<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-img-top {
            object-fit: cover;
            height: 200px; /* 画像の高さを調整 */
        }
    </style>

    <style>
        .custom-card {
            /* カードの幅を調整 */
            width: 18rem;
            width: 25rem;
        }
    </style>

</head>
<body>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1>ボーナスポイントにチャレンジ！<br>写真を投稿しよう！</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">アップロード</button>
    </form>

    <div class="row row-cols-1 row-cols-md-2 g-2">
        @foreach($bonuses as $bonus)
        <div class="col">
            <div class="card custom-card"> <!-- カード自体のクラスに custom-card を追加 -->
                <img src="{{ asset('storage/img/' . $bonus->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

        @endforeach
    </div>



    <a href="{{ route('todo.index') }}">戻る</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>