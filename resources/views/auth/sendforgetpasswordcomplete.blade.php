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
                      パスワード再設定(確認メール送信完了)
                  </li>
              </ul>
          </div>
          <div class="register_bg_wrap mypage_form">
              <h1 class="mypage_form_title">
                  パスワード再設定<br>
                  確認メールを送信しました​
              </h1>
              <p class="mypage_pwd_text">
                  {{$data}} 宛に、パスワード再設定ページへのご案内メールをお送りいたしました。メール内に記載されているURLの有効期限は24時間です。<br>
                  24時間以内にアクセスしていただけなかった場合は、再度お手続きをお願いいたします。​<br><br>
                  <span>しばらくしてもメールが届かない場合、保育ひろばへのご登録がないか、ご入力いただいたメールアドレスに誤りがある場合はございます。</span>
                  その際は、お手数ですが、再度<a href="/register">ご登録</a>いただくか、<a href="/help/contact2">お問い合わせ窓口</a>までご連絡ください。
              </p>
              
          </div>
      </div>
  </div>
</main>
@endsection