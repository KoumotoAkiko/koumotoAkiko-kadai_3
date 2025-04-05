<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
<div class="register-form">
    <h1 class="register-form__heading">PiGLy</h1>
    <h2 class="register-form__heading-title">新規会員登録</h2>
    <h4 class="register-form__heading-content">STEP1 アカウント情報の登録</h4>
    <div class="register-form__inner">
        <form class="register-form__form" action="/register/step1" method="post">
            @csrf
            <div class="register-form__group">
                <label class="register-form__label" for="name">お名前</label>
                <input class="register-form__input" type="text" name="name" id="name" placeholder="例:山田太郎" value="{{old('name')}}">
                <p class="error-message">
                    @error('name')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="register-form__group">
                <label class="register-form__label" for="email">メールアドレス</label>
                <input class="register-form__input" type="email" name="email" id="email" placeholder="例:test@gmail.com" value="{{old('email')}}">
                <p class="error-message">
                    @error('email')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="register-form__group">
                <lavel class="register-form__label" for="password">パスワード</label>
                <input class="register-form__input" type="password" name="password" id="password" placeholder="例:coachtech123">
                <p class="error-message">
                    @error('password')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <input class="register-form__btn btn" type="submit" value="次に進む">
            <p>
                <a href="/admin/login">ログインはこちら</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>