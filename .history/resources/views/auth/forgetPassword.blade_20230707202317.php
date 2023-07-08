@extends('layout')
  
@section('content')
<main class="common_main">
    <div class="register_wrap">
        <div class="common_inner_s">
            <div class="pankuzu_block">
                <ul class="pankuzu_list">
                    <li class="pankuzu_item">
                        <a href="/" class="pankuzu_link">ホーム</a>
                    </li>
                    <li class="pankuzu_item">
                        パスワード再設定
                    </li>
                </ul>
            </div>
            <form action="/send_password_email" method="post">
                @csrf
                <div class="register_bg_wrap mypage_form">
                    <h1 class="mypage_form_title">
                        パスワード再設定
                    </h1>
                    <p class="mypage_form_text sp_left">
                        ご登録いただいているメールアドレスを入力の上、『送信』ボタンを押してください。<br>
                        パスワード再設定ページへのご案内メールをお送りいたします。
                    </p>
                    <ul class="form_list mb26">
                        <li class="form_item">
                            <h2 class="form_title">メールアドレス</h2>
                            <input type="email" name="email" value="" class="form_input" placeholder="">
                            <p class="form_error_text"></p>
                        </li>
                    </ul>
                    <button type="submit" class="common_btn01 w320 center">送信</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection