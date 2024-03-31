<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    {{-- <h1>{{ $todos->title }}</h1> --}}
    {{-- <h1>20日継続！！</h1> --}}
    <h1>ボーナスポイントにチャレンジ！<br>写真を投稿しよう！</h1>
    {{-- <p>{{   }}</p> --}}
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">アップロード</button>
    </form>

    <div>
        @foreach($bonuses as $bonus)
        <img src="{{ asset('storage/img/' . $bonus->image) }}" alt="">
    @endforeach
  

    
    
    </div>
    <a href={{ url()->previous() }}>戻る</a>
</body>
</html>