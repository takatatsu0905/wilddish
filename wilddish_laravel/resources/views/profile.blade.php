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

    <div class="icon-box">
        <div class="icon">
            <p>アイコン位置</p>
            <img src="{{Storage::url($profile->image_name)}}" width="100px">
        </div>
    </div>

    <div class="selfintroduction-box">
        <div class="selfintroduction">
            <p>自己紹介欄</p>
            <p>{{$profile->serf_introduction}}</p>
        </div>
        <a href="{{route('profile.edit',['id'=>$profile->id])}}">{{ __('編集') }}</a>
        
    
        <!-- <input type="button" value="編集" onclick="location.href='/profile/update'"> -->
    
        
    </div>

    <div class="yokonarabi">
        <div class="toukourecipe-box">
            <div class="toukourecipe">
                <p>投稿レシピ</p>
            </div>
        </div>
        <div class="favorite-box">
            <div class="favorite">
                <p>お気に入り</p>
            </div>
        </div>
    </div>
    <p>{{$profile->name}}</p>
    
</body>
</html>