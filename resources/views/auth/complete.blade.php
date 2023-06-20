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
                      会員登録完了
                  </li>
              </ul>
          </div>
          <form method="" action="">
              <div class="register_bg_wrap register_complete">
                  <h1 class="register_title">登録確認メールを<br class="common_sp_640">送信しました</h1>
                  <div class="register_complete_main">
                      <p class="register_send_text">
                        以下のメールアドレスへ「ユーザー登録確認メール」を送信しました。<br class="common_pc_640">メールの内容を確認し、登録手続きを完了させてください。
                      </p>
                      <p class="register_send_mail">
                          {{$data2}}
                      </p>
                      <p class="register_send_subtext">
                          しばらくしても登録確認メールが届かない場合は、ご入力いただいたメールアドレスに間違いがあった可能性があります。お手数ですが、再度<a href="/register">ご登録</a>いただくか、<a href="/help/contact2">お問い合わせ窓口</a>までご連絡ください。
                      </p>
                  </div>
              </div>
          </form>
      </div>
  </div>
</main>

              <!-- login popup -->
<div class="popup_filter" id="LoginFilter"></div>
<div class="popup_wrap" id="LoginWindow">
  <button type="button" class="popup_close_btn PopCloseBtn">
      <img src="{{asset('assets/user/images/popup/close_icon.svg')}}" alt="close">
  </button>
  <div class="popup_inner">
      <p class="popup_title">
          こちらの機能をお使い頂くには<br>
          会員登録が必要です
      </p>
      <a href="/register" class="common_btn01 radius-small">会員登録(無料)</a>
      <div class="align_center">
          <a href="/login" class="popup_login_link">ログインはこちら</a>
      </div>
  </div>
</div>
@endsection