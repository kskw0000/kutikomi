@extends('layout')
  
@section('content')

<main class="common_main">
  <div class="others_wrap">
      <div class="common_inner_s">
          <div class="pankuzu_block mb15">
              <ul class="pankuzu_list">
                  <li class="pankuzu_item">
                      <a href="/" class="pankuzu_link">ホーム</a>
                  </li>
                  <li class="pankuzu_item">
                      スコアについて
                  </li>
              </ul>
          </div>
          <div class="others_bg_wrap">
              <h1 class="others_title01 info">
                  スコアについて
              </h1>
              <p class="others_score_text">
                  スコアは、投稿された口コミのうち有効な口コミのみで算出しております。点数は単純平均ではなく、より正確なスコアとするために保育士Reach独自のアルゴリズムにより算出しています。
              </p>
              <div class="others_point_block">
                  <div class="others_score_point_head">
                      <h2 class="others_score_point_title">
                          スコア算出方法について
                          <span>スコア算出する際に重視している3つのポイント</span>
                      </h2>
                      <img src="{{asset('assets/user/images/others/score_point.png')}}" alt="スコア算出方法について">
                  </div>
                  <ul class="others_point_list">
                      <li class="others_point_item">
                          <span class="common_pc">
                              <img src="{{asset('assets/user/images/others/score01.jpg')}}" alt="口コミ数" class="others_point_pic">
                          </span>
                          <div class="others_point_main">
                              <h3 class="others_point_title">
                                  <span>1</span>口コミ数
                              </h3>
                              <h4 class="others_point_subtitle">
                                  評価が集まらないとスコアが上がりづらい
                              </h4>
                              <p class="others_point_text fs_small">
                                  ユーザーからより多くの評価が集まることで、評価が変動していく仕組みになっています。<br>
                                  例えば、ユーザーの星5が2件しかないスコアよりも10件集まっている園のほうが高いスコアになります。
                              </p>
                          </div>
                      </li>
                      <li class="others_point_item">
                          <span class="common_pc">
                              <img src="{{asset('assets/user/images/others/score02.jpg')}}" alt="最新性" class="others_point_pic">
                          </span>
                          <span class="common_sp">
                              <img src="{{asset('assets/user/images/others/score01.jpg')}}" alt="最新性" class="others_point_pic">
                          </span>
                          <div class="others_point_main">
                              <h3 class="others_point_title">
                                  <span>2</span>最新性
                              </h3>
                              <h4 class="others_point_subtitle">
                                  最新の口コミの影響度のほうが大きい
                              </h4>
                              <p class="others_point_text fs_small">
                                  勤務時期が過去の口コミよりも、最近まで勤務していた保育士からの口コミの方がより正確で有益な情報となるため、影響度が高まります。
                              </p>
                          </div>
                      </li>
                      <li class="others_point_item">
                          <span class="common_sp">
                              <img src="{{asset('assets/user/images/others/score02.jpg')}}" alt="最新性" class="others_point_pic">
                          </span>
                          <div class="others_point_main">
                              <h3 class="others_point_title">
                                  <span>3</span>信頼性
                              </h3>
                              <h4 class="others_point_subtitle">
                                  ユーザーの信頼度も影響
                              </h4>
                              <p class="others_point_text fs_small">
                                  過去にガイドラインに背くような投稿をされたユーザーの評価は、スコアの影響度が下がります。
                              </p>
                          </div>
                      </li>
                  </ul>
              </div>
              <h2 class="others_score_title">スコア更新について</h2>
              <p class="others_score_text">
                  正確性・信頼性を高めるため、アルゴリズムは日々アップデートを行っています。新規の口コミが投稿されなくてもスコアが変動することがございます。
              </p>
          </div>
      </div>
  </div>
</main>

@endsection