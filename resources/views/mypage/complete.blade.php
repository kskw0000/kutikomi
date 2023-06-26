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
                      <a href="/mypage" class="pankuzu_link">マイページ</a>
                  </li>
                  <li class="pankuzu_item">
                      パスワード変更完了
                  </li>
              </ul>
          </div>
          <div class="register_bg_wrap mypage_form">
              <h1 class="mypage_form_title">
                  パスワード変更完了
              </h1>
              <p class="mypage_complete_text">
                  パスワードの変更が完了しました。<br>
                  次回より新しいパスワードでログインしてください。​
              </p>
              <a href="/mypage" class="common_btn01 center w320">トップに戻る</a>
          </div>
      </div>
  </div>
</main>

@endsection