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
                      退会の手続き
                  </li>
              </ul>
          </div>
          <div class="register_bg_wrap mypage_form">
              <h1 class="mypage_form_title">
                  退会の手続き
              </h1>
              <p class="mypage_form_text common_pc">
                  内容を編集して「変更する」ボタンを押してください。
              </p>
              <ul class="mypage_withdrawal_list">
                  <li class="mypage_withdrawal_item">
                      <h2 class="mypage_withdrawal_title">退会にあたっての注意事項</h2>
                      <ul class="mypage_withdrawal_info_list">
                          <li class="mypage_withdrawal_info_item">
                              投稿いただいた口コミのデータは退会後も削除されず、引き続き当サイトに掲載されます。
                          </li>
                          <li class="mypage_withdrawal_info_item">
                              お知らせメールを受信されていた方は、退会完了と同時に配信を停止いたします。
                          </li>
                      </ul>
                  </li>
                  <li class="mypage_withdrawal_item">
                      <p class="mypage_withdrawal_text">
                          退会で消失する下書き中のレポート、フォロー中の企業、各種登録情報は、再登録しても復活しません。<br><br class="common_sp_640">
                          退会される場合は「退会手続きを進める」ボタンを押してください。
                      </p>
                  </li>
              </ul>
              <div class="form_btnarea">
                  <a href="/mypage/quiet/survey" class="common_btn01">退会手続きを進める</a>
                  <a href="/mypage" class="common_btn04">キャンセル</a>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection