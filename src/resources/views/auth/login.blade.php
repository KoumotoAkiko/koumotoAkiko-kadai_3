<!DOCTYPE html>
<html lang="ja">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-form">
        <h1 class="login-form__heading">PiGLy</h1>
        <h2 class="login-form__heading-title">ログイン</h2>

    <div class="login-form__inner">
        <form class="login-form__form" action="/admin/login" method="post">
            @csrf
            <div class="login-form__group">
                <label class="login-form__label" for="email">メールアドレス</label>
                <input class="login-form__input" type="email" name="email" placeholder="例:test@gmail.com">
                <p class="error-message">
                    @error('email')
                    {{$message}}
                    @enderror
                </p>
            </div>

            <div class="login-form__group">
                <label class="login-form__label" for="password">パスワード</label>
                <input class="login-form__input" type="password" name="password" id="password"
                placeholder="例:coachtech123">
                <p class="error-message">
                    @error('password')
                    {{$message}}
                    @enderror
                </p>
            </div>
            <input class="login-form__btn btn" type="submit" value="ログイン">
            <p>
                <a href="/register/step1">アカウントの作成はこちら</a>
            </p>
        </form>
    </div>
    </div>
</body>
</html>