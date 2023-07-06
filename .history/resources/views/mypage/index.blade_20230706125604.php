@extends('layout')
  
@section('content')

<main class="common_main">
  <div class="others_wrap">
      <div class="common_inner_m">
          <div class="pankuzu_block mb20">
              <ul class="pankuzu_list">
                  <li class="pankuzu_item">
                      <a href="/" class="pankuzu_link">ホーム</a>
                  </li>
                  <li class="pankuzu_item">
                    マイページ
                  </li>
              </ul>
          </div>
          <h1 class="others_title02">
            @if (isset(session('user')['name']))
                {{session('user')['name']}}さんのページ
            @endif
              
          </h1>
          <div class="others_sitemap_block">
              <div class="others_sitemap_box">
                  <h2 class="others_sitemap_title">個人設定</h2>
                  <ul class="others_sitemap_list">
                      <li class="others_sitemap_item">
                          <a href="/mypage/like" class="others_sitemap_link">気になる求人一覧</a>
                      </li>
                      <li class="others_sitemap_item">
                          <a href="/mypage/following" class="others_sitemap_link">フォロー中の保育園一覧</a>
                      </li>
                      <li class="others_sitemap_item">
                          <a href="/mypage/user/email" class="others_sitemap_link">メール配信設定</a>
                      </li>
                      <li class="others_sitemap_item">
                          <a href="/mypage/password" class="others_sitemap_link">パスワード変更</a>
                      </li>
                      <li class="others_sitemap_item">
                          <a href="/mypage/user" class="others_sitemap_link">ユーザー設定</a>
                      </li>
                  </ul>
              </div>
              <div class="others_sitemap_box">
                  <h2 class="others_sitemap_title">口コミ関連情報</h2>
                  <ul class="others_sitemap_list">
                      <li class="others_sitemap_item">
                          <a href="/answer" class="others_sitemap_link">口コミ投稿</a>
                      </li>
                      <li class="others_sitemap_item">
                          <a href="/mypage/draft" class="others_sitemap_link">下書き中の口コミ一覧</a>
                      </li>
                      <li class="others_sitemap_item">
                          <a href="/mypage/review" class="others_sitemap_link">投稿済みの口コミ一覧</a>
                      </li>
                  </ul>
              </div>
              <div class="others_sitemap_box">
                  <h2 class="others_sitemap_title">ユーザー情報</h2>
                  <ul class="others_sitemap_list">
                      <li class="others_sitemap_item">
                          <a href="/logout" class="others_sitemap_link">ログアウト</a>
                      </li>
                      <li class="others_sitemap_item">
                          <a href="/mypage/quiet" class="others_sitemap_link">退会の手続き</a>
                      </li>
                  </ul>
              </div>
              <div class="others_sitemap_box">
                <h2 class="others_sitemap_title">会社情報・ヘルプ・その他</h2>
                <ul class="others_sitemap_list">
                  <li class="others_sitemap_item">
                    <a href="/terms" class="others_sitemap_link">利用規約</a>
                  </li>
                  <li class="others_sitemap_item">
                    <a href="/policy" class="others_sitemap_link">個人情報の取り扱いについて</a>
                  </li>
                  <li class="others_sitemap_item">
                    <a href="https://proreach.co.jp/" class="others_sitemap_link">運営会社</a>
                  </li>
                  <li class="others_sitemap_item">
                    <a href="/guide" class="others_sitemap_link">口コミ投稿ガイドライン</a>
                  </li>
                  <li class="others_sitemap_item">
                    <a href="/help" class="others_sitemap_link">ヘルプ</a>
                  </li>
                </ul>
              </div>
          </div>
      </div>
  </div>
</main>

@endsection