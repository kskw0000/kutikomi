<footer>
  <div class="footer_wrap">
      <div class="common_inner">
          <div class="footer_head">
              <div class="footer_pankuzu_block">
                  <ul class="pankuzu_list">
                      <li class="pankuzu_item">
                          ホーム
                      </li>
                  </ul>
              </div>
              <div class="footer_head_flex">
                  <img src="{{asset('assets/user/images/character/icon09.svg')}}" alt="保育士Reach" class="footer_icon">
                  <a href="/" class="footer_top_btn">
                      <img src="{{asset('assets/user/images/common/top_icon.png')}}" alt="ページトップ">
                  </a>
              </div>
          </div>
          <div class="footer_main">
              <div class="footer_inner">
                  <div class="footer_info_block">
                      <a href="/" class="footer_logo">
                          
                          <img src="{{asset('/assets/user/images/footer/logo_yellow.svg')}}" alt="ページトップ">
                      </a>
                      <p class="footer_info_text">
                          保育士による保育園の口コミ評判サイトなら【保育士Reach】。<br>保育士Reachは、「2023年06月10日時点で1120件」の保育士口コミ・評判を掲載しています。<br>
                          「職員同士の人間関係」「管理職との人間関係」「保護者との人間関係」「給与・福利厚生」「保育方針」「業務量」「園庭・園舎」「シフトの融通」の8つの保育士口コミ・評判カテゴリーから保育園について知ることができます。<br>
                          多様な価値観をもった保育士による口コミ・評判を見ることで、よりあなたにピッタリな保育園を見つけましょう。<br>
                          保育士Reachは”もっとオープンな園探し”をテーマに、保育士と保育園のミスマッチが解消されていく社会を本気で目指しています。
                      </p>
                  </div>
                  <div class="footer_link_block">
                      <ul class="footer_link_list">
                          <li class="footer_link_item">
                              <a href="/" class="footer_link">トップページ</a>
                          </li>
                          <li class="footer_link_item">
                              <a href="/terms" class="footer_link">利用規約</a>
                          </li>
                          <li class="footer_link_item">
                              <a href="http://napps-log.com/" class="footer_link" target="_blank" rel="noopener noreferrer">個人情報の取り扱いについて</a>
                          </li>
                          <li class="footer_link_item">
                              <a href="/sitemap" class="footer_link">サイトマップ</a>
                          </li>                            
                          <li class="footer_link_item">
                              <a href="https://proreach.co.jp/" class="footer_link" target="_blank" rel="noopener noreferrer">運営会社</a>
                          </li>                            
                          <li class="footer_link_item">
                              <a href="/policy" class="footer_link">運営ポリシー</a>
                          </li>
                          <li class="footer_link_item">
                              <a href="/guide" class="footer_link">口コミ投稿ガイドライン</a>
                          </li>
                          <li class="footer_link_item">
                              <a href="/help" class="footer_link">ヘルプ</a>
                          </li>

                          
                          
                      </ul>
                      <img src="{{asset('/assets/user/images/footer/character_icon.svg')}}" alt="保育士Reach" class="footer_icon">
                  </div>
                 
              </div>
          </div>
<<<<<<< HEAD
          <small class="footer_copyright"></small>
=======
          <small class="footer_copyright">© NEO CAREER CO., LTD.</small>
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
      </div>
  </div>
</footer>
<script>
    $(function(){
        //現在の日付データを取得する準備
        var day = new Date(); 
        var y = day.getFullYear(); //西暦を取得
        var m = day.getMonth()+1; //月を取得
        var d = day.getDate(); //日を取得
        //月日1ケタの場合は0を追加
        if (m < 10) { m = '0' + m; }
        if (d < 10) { d = '0' + d; }
        //文字列変換
        y = y.toString();
        m = m.toString();
        d = d.toString();
        today = y+m+d;//日付を連結させる

        //2022年12月31日中まで表示
        if(today <= "20240229" ){
            setTimeout(() => {
                if(!sessionStorage.getItem('event_popup')) {
                    sessionStorage.setItem('event_popup', 'on');
                    $("#EventPopFilter").fadeIn();
                    $("#EventPopWindow").show();
                }
            }, 5000);
        } else {
            console.log("event期間が終了したのでevent_popupのincludeをコメントアウトする");
        }
    });
</script>