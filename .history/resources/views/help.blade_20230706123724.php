@extends('layout')
  
@section('content')

<main class="common_main" id="help_main">
  <div class="others_wrap">
      <div class="common_inner_m">
          <div class="pankuzu_block mb20">
              <ul class="pankuzu_list">
                  <li class="pankuzu_item">
                      <a href="/" class="pankuzu_link">ホーム</a>
                  </li>
                  <li class="pankuzu_item">
                      ヘルプ
                  </li>
              </ul>
          </div>
          <h1 class="others_title02">
              ヘルプ
          </h1>
          <div class="common_sp_640">
              <div class="others_help_search">
                  <input type="text" name="keyword" v-model="keyword" class="others_help_input" placeholder="検索">
                  <button type="button" class="others_help_search_btn">
                      <img src="{{asset('assets/user/images/school/search_icon_gray.svg')}}" alt="search">
                  </button>
              </div>
          </div>
          <div class="others_help_layout">
              <div class="others_help_block">
                  <div class="others_help_box">
                      <h2 class="others_help_title">保育ひろばについて</h2>
                      <ul class="others_help_list">
                          <li class="others_help_item active ">
                              <div class="others_help_quest_block QABtn">
                                  <p class="others_help_quest_icon">Q.</p>
                                  <h2 class="others_help_quest_title">
                                      <span>サービスの利用に料金はかかりますか？</span>
                                  </h2>
                              </div>
                              <div class="others_help_answer_block">
                                  <p class="others_help_answer_text">
                                      <span class="others_help_answer_icon">A.</span>
                                      <span>保育ひろばの会員登録やサービスの利用は無料です。</span>
                                  </p>
                              </div>
                          </li>
                          <li class="others_help_item active">
                            <div class="others_help_quest_block QABtn">
                                <p class="others_help_quest_icon">Q.</p>
                                <h2 class="others_help_quest_title">
                                    <span>会員登録をすると何ができますか？</span>
                                </h2>
                            </div>
                            <div class="others_help_answer_block QABtn">
                                <p class="others_help_answer_text">
                                    <span class="others_help_answer_icon">A.</span>
                                    <span>会員登録をしていただくと、下記ができるようになります。

                                        ①興味のある保育園の新着口コミをチェックできる
                                        興味をもっている保育園に対し、「フォロー機能」をお使いいただくことで、新着口コミのお知らせメールを受信することができます。
                                        
                                        ②気になる求人をブックマークできる
                                        気になる求人に対して「気になる」ボタンを押すことで、いつでもマイページから見返すことができます。
                                        
                                        会員登録はこちらから ≫</span>
                                </p>
                            </div>
                        </li>     
                        <li class="others_help_item active">
                            <div class="others_help_quest_block QABtn">
                                <p class="others_help_quest_icon">Q.</p>
                                <h2 class="others_help_quest_title">
                                    <span>「保育ひろば」とはどのようなサイトですか？</span>
                                </h2>
                            </div>
                            <div class="others_help_answer_block">
                                <p class="others_help_answer_text">
                                    <span class="others_help_answer_icon">A.</span>
                                    <span>「保育ひろば」とは就職・転職の保育園選びに役立つサイトです。
                                        日本全国の保育園について、実際に働く保育士や元保育士から"リアルな声"を収集し、わかりやすくまとめて掲載しています。</span>
                                </p>
                            </div>
                        </li>                 
                    </ul>
                  </div>

                  <div class="others_help_box">
                    <h2 class="others_help_title">メールの配信</h2>
                    <ul class="others_help_list">
                        <li class="others_help_item active ">
                            <div class="others_help_quest_block QABtn">
                                <p class="others_help_quest_icon">Q.</p>
                                <h2 class="others_help_quest_title">
                                    <span>退会したのにメールが届きます。</span>
                                </h2>
                            </div>
                            <div class="others_help_answer_block">
                                <p class="others_help_answer_text">
                                    <span class="others_help_answer_icon">A.</span>
                                    <span>退会後にメールマガジンや各種お知らせメールが届く場合、以下の原因が考えられます。

                                        ①メール配信設定後に退会された
                                        メールマガジンや各種お知らせメールの配信設定後に退会された場合、退会前に配信設定されたメールが数日程度お手元に届く可能性があります。何卒ご了承ください。
                                        
                                        ②他のメールアドレスで会員登録している
                                        メールアドレスを複数所有されている方は、ほかのメールアドレスでご登録いただいている可能性がございます。
                                        ほかのメールアドレスでご登録されている場合、アカウントごとに退会のお手続きをお願いいたします。</span>
                                </p>
                            </div>
                        </li>
                        <li class="others_help_item active">
                          <div class="others_help_quest_block QABtn">
                              <p class="others_help_quest_icon">Q.</p>
                              <h2 class="others_help_quest_title">
                                  <span>配信停止をしたのにメールが届きます。</span>
                              </h2>
                          </div>
                          <div class="others_help_answer_block QABtn">
                              <p class="others_help_answer_text">
                                  <span class="others_help_answer_icon">A.</span>
                                  <span>配信停止後にメールマガジンや各種お知らせメールが届く場合、以下の原因が考えられます。

                                    ①すべてのメールの配信停止が完了していない
                                    保育ひろばからお送りしている以下メールのいずれかを配信停止されていない可能性がございます。
                                    ・お知らせメール
                                    ・フォローしている園の新着口コミメール
                                    ・求人関連のコンテンツを配信するメール
                                    
                                    ログインの上、「マイページ＞ユーザー設定＞メール配信設定」よりメールの配信状況をご確認ください。
                                    
                                    ②メール配信設定後に配信停止された
                                    メールマガジン、各種お知らせメールの配信設定後に配信停止された場合、配信停止前に設定されたメールが数日程度お手元に届く可能性があります。何卒ご了承ください。
                                    
                                    ③ほかのメールアドレスで会員登録している
                                    メールアドレスを複数所有されている方は、他のメールアドレスでご登録いただいている可能性がございます。
                                    他のメールアドレスでご登録されている場合、アカウントごとに配信停止のお手続きをお願いいたします。</span>
                              </p>
                          </div>
                      </li>     
                      <li class="others_help_item active">
                          <div class="others_help_quest_block QABtn">
                              <p class="others_help_quest_icon">Q.</p>
                              <h2 class="others_help_quest_title">
                                  <span>「保育ひろばからのメールが届きません。</span>
                              </h2>
                          </div>
                          <div class="others_help_answer_block">
                              <p class="others_help_answer_text">
                                  <span class="others_help_answer_icon">A.</span>
                                  <span>保育ひろばからのメールが届かない場合、以下に心当たりがないかご確認ください。

                                    ①迷惑メールフォルダなどに入っている
                                    迷惑メールフォルダやゴミ箱に振り分けられていないかご確認ください。
                                    
                                    ②保育ひろばからのメールが届かない設定になっている
                                    「」ドメインの受信を許可していただき、お問い合わせフォームからご連絡ください。</span>
                              </p>
                          </div>
                      </li>              
                      <li class="others_help_item active">
                        <div class="others_help_quest_block QABtn">
                            <p class="others_help_quest_icon">Q.</p>
                            <h2 class="others_help_quest_title">
                                <span>メール配信を停止したいです。</span>
                            </h2>
                        </div>
                        <div class="others_help_answer_block">
                            <p class="others_help_answer_text">
                                <span class="others_help_answer_icon">A.</span>
                                <span>
                                    こちらからメールの配信停止を行ってください。「マイページ＞ユーザー設定＞メール配信設定」からもメールの配信停止ができます。</span>
                            </p>
                        </div>
                    </li>                            
                  </ul>
                </div>                  
              </div>
              <div class="others_help_block">
                  <div class="others_help_box">
                      <h2 class="others_help_title">会員登録・ログイン</h2>
                      <ul class="others_help_list">
                          <li class="others_help_item" >
                              <div class="others_help_quest_block QABtn">
                                  <p class="others_help_quest_icon">Q.</p>
                                  <h2 class="others_help_quest_title">
                                      <span>パスワードを忘れました</span>
                                  </h2>
                              </div>
                              <div class="others_help_answer_block">
                                  <p class="others_help_answer_text">
                                      <span class="others_help_answer_icon">A.</span>
                                      <span>パスワード再設定よりパスワードの再設定を行ってください。</span>
                                  </p>
                              </div>
                          </li>
                          <li class="others_help_item" >
                            <div class="others_help_quest_block QABtn">
                                <p class="others_help_quest_icon">Q.</p>
                                <h2 class="others_help_quest_title">
                                    <span>ログインできません</span>
                                </h2>
                            </div>
                            <div class="others_help_answer_block">
                                <p class="others_help_answer_text">
                                    <span class="others_help_answer_icon">A.</span>
                                    <span>保育ひろばの会員登録完了時には以下のメールをお送りしています。会員登録完了メールが届いているメールアドレスがないか、念のためご確認ください。

                                        件名：【保育ひろば】会員登録完了のお知らせ
                                        
                                        なお、パスワードをお忘れの場合、パスワード再設定より再設定が可能です。</span>
                                </p>
                            </div>
                        </li>     
                        <li class="others_help_item" >
                            <div class="others_help_quest_block QABtn">
                                <p class="others_help_quest_icon">Q.</p>
                                <h2 class="others_help_quest_title">
                                    <span>退会したいです</span>
                                </h2>
                            </div>
                            <div class="others_help_answer_block">
                                <p class="others_help_answer_text">
                                    <span class="others_help_answer_icon">A.</span>
                                    <span>
                                        こちらから退会手続きを行ってください。
                                        
                                        ログインしたのちに、「マイページ」の下部「退会の手続き」からも退会手続きができます。</span>
                                </p>
                            </div>
                        </li>
                        <li class="others_help_item" >
                            <div class="others_help_quest_block QABtn">
                                <p class="others_help_quest_icon">Q.</p>
                                <h2 class="others_help_quest_title">
                                    <span>パスワードを変更したいです。</span>
                                </h2>
                            </div>
                            <div class="others_help_answer_block">
                                <p class="others_help_answer_text">
                                    <span class="others_help_answer_icon">A.</span>
                                    <span>
                                        ログインの上、「マイページ ＞パスワード変更」よりパスワードの変更を行ってください。</span>
                                </p>
                            </div>
                        </li>
                      </ul>
                  </div>
                  <div class="others_help_box">
                    <h2 class="others_help_title">口コミの登録・削除</h2>
                    <ul class="others_help_list">
                        <li class="others_help_item" >
                            <div class="others_help_quest_block QABtn">
                                <p class="others_help_quest_icon">Q.</p>
                                <h2 class="others_help_quest_title">
                                    <span>自分が投稿した口コミが反映されません。</span>
                                </h2>
                            </div>
                            <div class="others_help_answer_block">
                                <p class="others_help_answer_text">
                                    <span class="others_help_answer_icon">A.</span>
                                    <span>ご投稿いただいた口コミは、掲載前に保育ひろば事務局にて確認を行っています。
                                        そのため、掲載までにお時間をいただく場合がございます。何卒ご了承ください。
                                        
                                        なお、ガイドラインに反する口コミは掲載しておりません。ガイドラインに則った口コミ投稿をお願いいたします。</span>
                                </p>
                            </div>
                        </li>
                        <li class="others_help_item" >
                          <div class="others_help_quest_block QABtn">
                              <p class="others_help_quest_icon">Q.</p>
                              <h2 class="others_help_quest_title">
                                  <span>自分が投稿した口コミを編集・削除したいです。</span>
                              </h2>
                          </div>
                          <div class="others_help_answer_block">
                              <p class="others_help_answer_text">
                                  <span class="others_help_answer_icon">A.</span>
                                  <span>口コミ送信後の編集・削除は不可としております。
                                    投稿者が保育ひろばを退会した場合も、口コミの削除は行っておりません。</span>
                              </p>
                          </div>
                      </li>     
                      <li class="others_help_item" >
                          <div class="others_help_quest_block QABtn">
                              <p class="others_help_quest_icon">Q.</p>
                              <h2 class="others_help_quest_title">
                                  <span>口コミを投稿したい企業が登録されていません。</span>
                              </h2>
                          </div>
                          <div class="others_help_answer_block">
                              <p class="others_help_answer_text">
                                  <span class="others_help_answer_icon">A.</span>
                                  <span>
                                    正式な保育園名で検索しても見つからない場合、お手数ですが、保育園の新規登録をお願いいたします。
                                    口コミ投稿フォームの企業選択時に表示される下部「見つからない場合はこちら≫」をクリックし、保育園情報をご登録ください。</span>
                              </p>
                          </div>
                      </li>
                    </ul>
                </div>
                <div class="others_help_box">
                    <h2 class="others_help_title">園情報</h2>
                    <ul class="others_help_list">
                        <li class="others_help_item" >
                            <div class="others_help_quest_block QABtn">
                                <p class="others_help_quest_icon">Q.</p>
                                <h2 class="others_help_quest_title">
                                    <span>保育園情報（園名・所在地など）の修正がしたいです。</span>
                                </h2>
                            </div>
                            <div class="others_help_answer_block">
                                <p class="others_help_answer_text">
                                    <span class="others_help_answer_icon">A.</span>
                                    <span>保育ひろばに掲載されている保育園情報（園名・所在地など）でもし誤った情報や古い情報が掲載される掲載されているなどのご指摘がある場合は、お問い合わせフォームにてご連絡ください。</span>
                                </p>
                            </div>
                        </li> 
                    </ul>
                </div>
              </div>
          </div>
          <div>
              <div class="others_help_contact_block">
                  <h3 class="others_help_contact_title">お問い合わせ窓口</h3>
                  <p class="others_help_contact_text">
                      受付時間: 365日<br>
                      対応時間: 平日10:00~18:00<br class="common_sp_640">（土日祝を除く）
                  </p>
                  <div class="others_help_contact_btnarea">
                      <a href="/help/contact2" class="common_btn01">ユーザー(保育士)の方</a>
                      <a href="/help/contact1" class="common_btn05">法人(保育園)の方</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

@endsection