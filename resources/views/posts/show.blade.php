<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show_style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #E7EEFE;
        }
    </style>
</head>

@extends('layouts.app_original')
@section('content')

<body>
    @if(Session::has('success'))
    <div id="successMessage" class="alert alert-secondary" style="transition: opacity 0.5s;">
        {{ Session::get('success') }}
    </div>
    <script>
        // 5秒後にメッセージを非表示にする関数
        setTimeout(function(){
            var successMessage = document.getElementById('successMessage');
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 500); // 0.5秒後に非表示に
        }, 3000); // 5000ミリ秒 = 5秒
    </script>
    @endif

    <h1>TODO diary</h1>

    {{-- <form action="" method="POST" enctype="multipart/form-data">
        @csrf --}}
        {{-- <input type="file" name="image"> --}}
        {{-- <input type="file" name="image" accept="image/*"> --}}
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">画像を選択してください</label>
                <div class="input-group" style="width: 100%;">
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" >
                    <button type="submit" class="uploadbutton" >＋</button>
                </div>
            </div>
        </form>

        {{-- <button type="submit" class="upload">＋</button> --}}
        
    {{-- </form> --}}

<div class="layooutfortododiary">
    <div class="row row-cols-1 row-cols-md-4 g-4 ">
        {{-- @foreach($bonuses as $bonus) --}}
        @foreach($bonuses->reverse() as $bonus)
        <div class="col">
            <div class="card custom-card"> <!-- カード自体のクラスに custom-card を追加 -->
                <div class='postimg'>
                    <img src="{{ asset('storage/img/' . $bonus->image) }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">写真投稿日: {{ $bonus->created_at }}</h5>
                
                    <button class="backtotopthesite" style="text-decoration: none;" onclick="scrollToTop()">top</button>

                    <script>
                        function scrollToTop() {
                          window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
                          });
                        }
                        </script>

                    <form action="{{ route('bonus.destroy', $bonus->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="deletebutton">×</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    <form action="{{ route('todo.index') }}" method="GET">
        <button type="submit" class="showback">back
        </button>
    </form>


@endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    

</body>
</html>