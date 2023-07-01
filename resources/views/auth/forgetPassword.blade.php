@extends('layout')
  
@section('content')
<<<<<<< HEAD
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
=======
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Reset Password</div>
                  <div class="card-body">
  
                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
  
                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Send Password Reset Link
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
</main>
@endsection