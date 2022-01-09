<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPページ（仮）</title>
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">ホーム</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ログイン</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">新規登録</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <p>Hello World!</p>
    <img src="{{asset('wilddish_img\キャンプ料理画像1.jpg')}}" alt="">
</body>
</html>