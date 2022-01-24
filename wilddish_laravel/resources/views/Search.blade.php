<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
</head>
<body>
    <header>
        <h1>ヘッダー予定</h1>
        
    </header>
    <p>検索画面だよ</p>
    <form method="GET" action="{{route('search')}}">
        @csrf
        <div>
            <label for="form-search">検索</label>
            <input type="search" name="q" id="form-search">
        </div>
        <button type="submit">レシピ検索</button>
    </form>

    
</body>
</html>