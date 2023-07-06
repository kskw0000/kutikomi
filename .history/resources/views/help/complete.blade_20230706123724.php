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
                      お問い合わせ完了
                  </li>
              </ul>
          </div>
          <div class="register_bg_wrap register_complete">
              <h1 class="register_title">
                  お問い合わせ内容を<br class="common_sp_640">受け付けました
              </h1>
              <p class="register_complete_text">
                  保育ひろばへのお問い合わせを受け付けました。<br>
                  内容をご確認後、担当者よりご連絡いたします。
              </p>
              <a href="/" class="common_btn01 center w320">トップに戻る</a>
          </div>
      </div>
  </div>
</main>
@endsection