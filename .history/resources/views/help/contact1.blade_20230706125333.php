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
                      お問い合わせ
                  </li>
              </ul>
          </div>
          <form action="/help/confirm" method="post">
          @csrf
            <input type="hidden" name="query_type" value="0">
            <div class="register_bg_wrap register_form">
              <h1 class="register_title">お問い合わせ</h1>
              <ul class="form_list">
              <li class="form_item">
                <h2 class="form_title">お問い合わせの種類<span>必須</span></h2>
                <select name="contact_type" class="form_select FormSelect">
                  <option value="">選択してください</option>
                  <option value="1">ユーザー登録情報について</option>
                  <option value="2">口コミについて</option>
                  <option value="3">その他</option>
                </select>
                <p class="form_error_text"></p>
              </li>
              <li class="form_item">
                <h2 class="form_title">氏名<span>必須</span></h2>
                <input type="text" name="name" value="" class="form_input" placeholder="">
                <p class="form_error_text"></p>
              </li>
              <li class="form_item">
                <h2 class="form_title">メールアドレス<span>必須</span></h2>
                <input type="email" name="email" value="" class="form_input" placeholder="">
                <p class="form_error_text"></p>
              </li>
              <li class="form_item">
                <h2 class="form_title">お問い合わせの内容<span>必須</span></h2>
                <textarea name="content" class="form_textarea h150"></textarea>
                <p class="form_error_text"></p>
              </li>
          </ul>
          <div class="form_privacy_block">
              <label class="form_priacty_label">
                  <input type="checkbox" name="accept_terms" value="1">
                  <p class="form_privacy_text">
                      <a href="http://napps-log.com/" target="_blank" rel="noopener noreferrer">個人情報の取り扱いについて</a> / <a href="/terms" target="_blank" rel="noopener noreferrer">利用規約</a><span>を確認し、同意します。</span>
                  </p>
              </label>
          </div>
          <button type="submit" class="common_btn01 center w320">確認画面に進む</button>
        </div>
      </form>            
    </div>
  </div>
</main>

@endsection