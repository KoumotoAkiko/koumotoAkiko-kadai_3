<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/target.css') }}">
</head>


<body>
<div class="target-form">
    <h1 class="target-form__heading">PiGLy</h1>
    <h2 class="target-form__heading-title">新規会員登録</h2>
    <h4 class="terget-form__heading-content">STEP2 体重データの入力</h4>
    
    <div class="target-form__inner">
        <form class="target-form__form" action="{{route('register.step2.store')}}" method="post">
            @csrf
            <div class="target-form__group">
                <input type="hidden" name="user_id" value="{{auth()->id()}}"><!--現在のログインしているユーザーのIdをフォームに埋め込む -->
                <label class="target-form__label">現在の体重<label>
                <input class="target-form__input" type="number" name="current_weight" id="current_weight" step="0.1"><span>kg</span>
                <p class="error-message">
                    @error('current_weight')
                    @enderror
                </p>
            </div>

            <div class="target-form__group">
                <label class="target-form__label">目標の体重</label>
                <input class="target-form__input" type="number" name="target_weight" id="target_weight" step="0.1"><span>kg</span>
                <p class="error-message">
                    @error('target_weight')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <input class="target-form__btn btn" type="submit" value="アカウント作成">
        </form>
    </div>
</body>
</html>