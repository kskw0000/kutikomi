@extends('layout')
  
@section('content')
<main class="common_main">
    <div class="login_wrap">
        <div class="common_inner_s">
            <div class="pankuzu_block">
                <ul class="pankuzu_list">
                    <li class="pankuzu_item">
                        <a href="/" class="pankuzu_link">ホーム</a>
                    </li>
                    <li class="pankuzu_item">
                        ログイン
                    </li>
                </ul>
            </div>
            <form method="post" action="{{route('login.post')}}">
                @csrf
                <div class="login_bg_wrap">
                    <h1 class="login_title">ログイン</h1>
                    <div class="login_main">
                        <ul class="login_list">
                            <li class="login_item">
                                <h2 class="form_title">メールアドレス<span>必須</span></h2>
                                <input type="email" name="email" value="" class="form_input">
                                <p class="form_error_text"></p>
                            </li>
                            <li class="login_item">
                                <h2 class="form_title">パスワード<span>必須</span></h2>
                                <div class="form_pwd_block">
                                    <input type="password" name="password" class="form_input" placeholder="">
                                    <button type="button" class="form_pwd_btn PwdBtn">
                                        <img src="{{asset('assets/user/images/form/pwd_active_icon.svg')}}" alt="見る" class="normal_icon">
                                        <img src="{{asset('assets/user/images/form/pwd_icon.svg')}}" alt="見ない" class="active_icon">
                                    </button>
                                </div>
                                <p class="form_error_text"></p>
                            </li>
                        </ul>
                        <div class="align_center common_pc_640">
                            <p class="login_forget_text">
                               パスワードをお忘れの方は<a href="/password_forget">こちら</a>
                            </p>
                        </div>
                        <button type="submit" class="common_btn01 w320 center">ログイン</button>
                        <div class="align_center common_sp_640">
                            <p class="login_forget_text">
                                パスワードをお忘れの方は<a href="/password_forget">こちら</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="align_center">
                    <p class="login_register_text">
                        会員登録がまだの方は<a href="/register">こちら</a>からご登録ください
                    </p>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection