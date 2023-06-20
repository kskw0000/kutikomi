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
                      メール配信設定の変更完了
                  </li>
              </ul>
          </div>
          <div class="register_bg_wrap mypage_form">
              <h1 class="mypage_form_title">
                  メール配信設定の変更完了
              </h1>
              <p class="mypage_form_text">
                  メール配信設定の変更が完了しました。
              </p>
              <ul class="form_confirm_list">
                  <li class="form_confirm_item">
                      <h2 class="form_confirm_title">通知を受け取る内容</h2>
                      <p class="form_confirm_text">
                        ・フォローしている園の新着口コミ<br>
                        ・求人関連のコンテンツを配信するメール
                      </p>
                  </li>
              </ul>
              <a href="/mypage" class="common_btn01 center w320">トップに戻る</a>
          </div>
      </div>
  </div>
</main>
@endsection