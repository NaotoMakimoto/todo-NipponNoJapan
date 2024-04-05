<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/level_style.css') }}">
    <style>
        /* Style for the progress meter */
        .progress-bar {
            width: 90%;
            background-color: #ddd;
            border-radius: 20px;
            margin: 1.5rem auto;
            overflow: hidden; /* Hides overflowing progress */
        }
        .progress {
            width: {{ ($points >= 25 ? ($points % 25) : $points) / 25 * 100 }}%; /* Dynamically set the width based on the points */
            background-color: #153a5b;
            height: 20px;
            border-radius: 20px;
            text-align: center;
            line-height: 20px;
            color: white;
            font-size: 0.8rem;
            transition: width 0.5s ease; /* Transition for smooth width change */
        }
    </style>
</head>

@extends('layouts.app_original')
@section('content')
<body>
    <button id="playButton">Play Sound</button>

<audio id="levelUpSound" src="/audio/hiro.mp4" preload="auto"></audio>

<script>
    document.getElementById('playButton').addEventListener('click', function() {
        playLevelUpSound();
    });

    function playLevelUpSound() {
        var audio = document.getElementById('levelUpSound');
        audio.play();
    }
</script>
    <h1>次のレベルまで<a> {{ $nextLevelPoints }} </a>pts</h1>
    <!-- Progress Meter -->
    <div class="progress-bar">
        <div class="progress" id="progress">{{ $points }}</div>
    </div>

    <div class="level_img_container">
            @if ($points >= 0 && $points < 25)
            <img src="{{ asset('img/n1.jpg') }}" alt="">
        @elseif ($points >= 25 && $points < 50)
            <img src="{{ asset('img/n2.jpg') }}" alt="">
        @elseif ($points >= 50 && $points < 75)
            <img src="{{ asset('img/n3.jpg') }}" alt="">
        @elseif ($points >= 75 && $points < 100)
            <img src="{{ asset('img/n4.jpg') }}" alt="">
        @elseif ($points >= 100 && $points < 125)
            <img src="{{ asset('img/n5.jpg') }}" alt="">
        @else
            <img src="{{ asset('img/n5.jpg') }}" alt="">
        @endif

    </div>
   


    @foreach($todos as $todo)
        <div class="level_continue">
            <div>{{ $todo->title }}</div>  
            <div>{{ $todo->continuous }}日継続！！</div>
            
        </div>
    @endforeach
    <div class="level_button">
        <a href="{{ route('todo.index') }}">back</a>
    </div>
@endsection

    <script>
        // JavaScript to update the progress bar width
        var progress = document.getElementById('progress');
        var points = {{ $points }};
        var nextLevelPoints = {{ $nextLevelPoints }};
        var progressBar = document.querySelector('.progress');

        // Function to update progress bar width
        function updateProgressBar() {
            var percentage = (points >= 25 ? (points % 25) : points) / 25 * 100;
            progressBar.style.width = percentage + '%';
        }

        // Call the function initially
        updateProgressBar();
    </script>
</body>
</html>
