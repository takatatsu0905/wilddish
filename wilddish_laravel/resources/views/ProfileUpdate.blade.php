<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
</head>
<body>
    <!-- ヘッダー -->
    <header>
        <h1>ヘッダー予定</h1>
    </header>
    <form action="{{route('profile.update',['id' =>$profile->id])}}" method="POST" enctype='multipart/form-data'>
        @csrf
    <div class="iconupdate">
        <input type="file" id="image" name="image">
    </div>
    <div class="introupdate">
        <input type="text" name="introtext" id="introtext"value="{{$profile->serf_introduction}}">
    </div>
    <input type="submit" value="更新">
    <p>{{$profile->name}}</p>
    </form>
</body>
</html>