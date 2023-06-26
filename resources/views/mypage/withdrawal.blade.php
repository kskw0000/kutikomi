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
                      退会アンケート
                  </li>
              </ul>
          </div>
          <form method="post" action="/mypage/quiet/store">
            @csrf
              <div class="register_bg_wrap mypage_form">
                  <h1 class="mypage_form_title">
                      退会アンケート
                  </h1>
                  <p class="mypage_form_text">
                      今後の参考とさせていただくため、<br class="common_sp_640">アンケートにご協力ください。
                  </p>
                  <ul class="form_list mb55">
                      <li class="form_item">
                          <h2 class="form_title">退会理由（複数選択可）</h2>
                          <ul class="form_check_list mb0">
                            <li class="form_check_item">
                              <label class="form_check_label">
                                <input type="checkbox" name="withdrawal_answers[]" value="1">
                                <span>就職・転職が決まったから</span>
                              </label>
                            </li>
                            <li class="form_check_item">
                              <label class="form_check_label">
                                <input type="checkbox" name="withdrawal_answers[]" value="2">
                                <span>就職・転職活動を停止したから</span>
                              </label>
                            </li>
                          </ul>
                          <ul class="form_check_list mb0">
                            <li class="form_check_item">
                              <label class="form_check_label">
                                <input type="checkbox" name="withdrawal_answers[]" value="3">
                                <span>見たい園の口コミがなかったから</span>
                              </label>
                            </li>
                            <li class="form_check_item">
                              <label class="form_check_label">
                                <input type="checkbox" name="withdrawal_answers[]" value="4">
                                <span>口コミの投稿が面倒だったから</span>
                              </label>
                            </li>
                            <li class="form_check_item">
                              <label class="form_check_label">
                                <input type="checkbox" name="withdrawal_answers[]" value="5">
                                <span>口コミの閲覧方法が分からなかったから</span>
                              </label>
                            </li>
                            <li class="form_check_item">
                              <label class="form_check_label">
                                <input type="checkbox" name="withdrawal_answers[]" value="6">
                                <span>口コミの内容に満足できなかったから</span>
                              </label>
                            </li>
                            <li class="form_check_item">
                              <label class="form_check_label">
                                <input type="checkbox" name="withdrawal_answers[]" value="7">
                                <span>メールが多いから</span>
                              </label>
                            </li>
                          </ul>
                          <ul class="form_check_list mb0">
                            <li class="form_check_item">
                              <label class="form_check_label">
                                  <input type="checkbox" name="withdrawal_answers[]" value="8">
                                  <span>その他</span>
                              </label>
                            </li>
                          </ul>
                          <textarea name="withdraw_reason" class="form_textarea h110"></textarea>
                          <p class="form_error_text"></p>
                      </li>
                  </ul>
                  <div class="form_btnarea">
                      <button type="submit" class="common_btn01">退会する</button>
                      <a href="/mypage/quiet/store" class="common_btn04">キャンセル</a>
                  </div>
              </div>
          </form>
      </div>
  </div>
</main>
@endsection