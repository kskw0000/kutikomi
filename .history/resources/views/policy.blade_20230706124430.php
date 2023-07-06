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
                      運営ポリシー
                  </li>
              </ul>
          </div>
          <div class="others_bg_wrap">
              <h1 class="others_title01 info">
                  口コミの信頼性を<br class="common_sp_640">確保するために​
              </h1>
              <p class="others_policy_text align_center">
                  保育士Reachは保育士へより質の高い、<br class="common_pc_640">信頼性のある情報をお届けするために、<br class="common_pc_640">以下の取り組みを行っています。
              </p>
              <div class="others_point_block">
                  <h2 class="others_policy_title">
                      口コミについて
                  </h2>
                  <ul class="others_point_list">
                      <li class="others_point_item">
                          <div class="others_point_main">
                              <h3 class="others_point_title">
                                  <span>1</span>保育士Reach運営事務局に<br class="common_sp_640">よる目視確認
                              </h3>
                              <p class="others_point_text">
                                  保育士Reachでは、保育業界に対しネガティブな影響を与えないよう努力する責任があると考えています。投稿された口コミは、システムでのチェックはもちろん、事務局にて目視確認も行っております。<br>
                                  下記口コミ投稿ガイドラインに基づき不適切だと判断した場合には掲載いたしません。<br><br>
                                  <a href="/guide">口コミ投稿ガイドライン</a>
                              </p>
                          </div>
                      </li>
                      <li class="others_point_item">
                          <div class="others_point_main">
                              <h3 class="others_point_title">
                                  <span>2</span>口コミ投稿時のルールの厳格化
                              </h3>
                              <p class="others_point_text">
                                  より保育士にとって役立つ健全性の高い口コミを提供するため、文字数制限を設け、コピー&ペーストができないようにする仕組みをとっており、容易に口コミ投稿できないようにしています。
                              </p>
                          </div>
                      </li>
                      <li class="others_point_item">
                          <div class="others_point_main">
                              <h3 class="others_point_title">
                                  <span>3</span>不適切な口コミの報告機能
                              </h3>
                              <p class="others_point_text">
                                  読み手が不適切だと感じる口コミについて、事務局に報告できるフォームを設けています。
                              </p>
                          </div>
                      </li>
                  </ul>
              </div>
              <h2 class="others_policy_title">スコアについて</h2>
              <h3 class="others_policy_subtitle">
                  独自のアルゴリズムによるスコア算出
              </h3>
              <p class="others_policy_sub_text">
                  保育士Reachでのスコアは、保育士からの回答をもとに有効なスコアのみを集計し、表示しています。<br>
                  スコアは単純平均ではなく、より信頼性を高めるために保育士Reach独自のアルゴリズムにより算出しています。アルゴリズムは日々アップデートを行っているため、新規投稿がなくてもスコアが変動する場合がございます。<br>
                  なお、スコア操作を防止するためアルゴリズムの開示は行っておりません。<br><br>
                  <a href="/score">スコアの詳細はこちら</a>
              </p>
          </div>
      </div>
  </div>
</main>

@endsection