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
            background-color: #f5f9fc;
        }
    </style>
</head>

@extends('layouts.app_original')
@section('content')

<body>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <h1>TODO diary</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <input type="file" name="image"> --}}
        <input type="file" name="image" accept="image/*">
        <button type="submit" class="btn btn-primary">＋</button>
    </form>

<div class="layooutfortododiary">
    <div class="row row-cols-1 row-cols-md-4 g-4 ">
        @foreach($bonuses as $bonus)
        <div class="col">
            <div class="card custom-card"> <!-- カード自体のクラスに custom-card を追加 -->
                <div class='postimg'>
                    <img src="{{ asset('storage/img/' . $bonus->image) }}" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">写真投稿日: {{ $bonus->created_at }}</h5>
                    <a href="#" class="backtotop">トップへ戻る</a>
                    <form action="{{ route('bonus.destroy', $bonus->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="deletebutton">削除</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    <form action="{{ route('todo.index') }}" method="GET">
        <button type="submit" class="showback">戻る</button>
    </form>


@endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    

</body>
</html>