@extends('layout')
  
@section('content')

<main class="common_main">
    <div class="mypage_wrap">
        <div class="mypage_inner">
            <div class="common_inner">
                <div class="pankuzu_block">
                    <ul class="pankuzu_list">
                        <li class="pankuzu_item">
                            <a href="/" class="pankuzu_link">ホーム</a>
                        </li>
                        <li class="pankuzu_item">
                            <a href="/mypage" class="pankuzu_link">マイページ</a>
                        </li>
                        <li class="pankuzu_item">
                            フォロー中の保育園
                        </li>
                    </ul>
                </div>
                <h1 class="mypage_title">
                    フォロー中の保育園
                </h1>
                <p class="mypage_text">
                    保育園をフォローすると、その保育園に新着口コミが追加された際や<br class="common_pc">求人掲載が始まった際にメールでお知らせします。
                </p>
                <ul class="mypage_school_list followed">
                    @foreach ($followedData as $item)
                    <li class="mypage_school_item">
                        <div class="school_box">
                            <div class="school_info_block">
                                @foreach ($item['facility_name'] as $facility)                                    
                                    <p class="school_label">{{$facility}}</p>
                                @endforeach
                                @if (session('user'))
                                <button type="button" class="common_follow_btn FollowBtn {{isset($item['followed_id'])? 'active': ''}}" data-nursery_id="{{$item['id']}}">
                                    <img src="{{asset('assets/user/images/common/follow_add_icon.svg')}}" alt="add" class="normal_icon">
                                    <img src="{{asset('assets/user/images/common/follow_check_icon.svg')}}" alt="checked" class="active_icon">
                                    <span>フォロー</span>
                                </button>
                                @else
                                <button type="button" class="common_follow_btn PopBtn" data-pop="Login">
                                    <img src="{{asset('assets/user/images/common/follow_add_icon.svg')}}" alt="add" class="normal_icon">
                                    <img src="{{asset('assets/user/images/common/follow_check_icon.svg')}}" alt="checked" class="active_icon">
                                    <span>フォロー</span>
                                </button>
                                @endif
                            </div>
                            <h2 class="school_title">{{$item['name']}}</h2>
                            <p class="school_place_text">
                                {{$item['cooperate_name']}} / {{$item['address']}}
                            </p>
                            <div class="school_content_relative">
                                @if ($item['review_count'] == 0)
                                    <div class="school_rate_block blur score_none active">
                                        <ul class="school_star_list">
                                            <li class="school_star_item">
                                                <img src="{{asset('assets/user/images/star/star10.svg')}}" alt="star10">
                                            </li>
                                            <li class="school_star_item">
                                                <img src="{{asset('assets/user/images/star/star10.svg')}}" alt="star10">
                                            </li>
                                            <li class="school_star_item">
                                                <img src="{{asset('assets/user/images/star/star10.svg')}}" alt="star10">
                                            </li>
                                            <li class="school_star_item">
                                                <img src="{{asset('assets/user/images/star/star00.svg')}}" alt="star00">
                                            </li>
                                            <li class="school_star_item">
                                                <img src="{{asset('assets/user/images/star/star00.svg')}}" alt="star00">
                                            </li>
                                        </ul>
                                        <p class="school_rate_num">0.0</p>
                                    </div>
                                    <div class="not_enough_score school_place_text school_content_absolute" style="top: 24%; left: 0%; font-size: 13px;">
                                        <strong>十分な数の評価がありません</strong>
                                    </div>
                                @else
                                <div class="school_rate_block blur score_none ">
                                    <ul class="school_star_list">
                                        @php
                                            $cur_rating = $item['review_rating'];
                                        @endphp
                                        @for($i = 0;$i<5;$i++)
                                            @if ($cur_rating>=1)
                                                <li class=school_star_item>
                                                    <img src='{{asset('assets/user/images/star/star10.svg')}}' alt='star10'>
                                                </li>
                                                @php $cur_rating-=1 @endphp
                                            @elseif ($cur_rating>0)
                                                <li class=school_star_item>
                                                    <img src='{{ asset("assets/user/images/star/star0" . $cur_rating * 10 . ".svg") }}' alt='star{{ $cur_rating * 10 }}'>
                                                </li>
                                                @php $cur_rating-=1 @endphp
                                            @else
                                                <li class=school_star_item>
                                                    <img src='{{asset('assets/user/images/star/star00.svg')}}' alt='star00'>
                                                </li>
                                            @endif
                                        @endfor
                                    </ul>
                                    <p class="school_rate_num">{{$item['review_rating']}}</p>        
                                </div>
                                @endif
                            </div>
                            <p class="school_post_text">
                                <img src="{{asset('assets/user/images/common/comment_icon.svg')}}" alt="talk">口コミ数<span>{{$item['review_count']}}</span>件
                            </p>
                            <div class="school_content_relative">
                                @if ($item['review_count'] == 0)
                                    <div class="school_no_block">
                                        <p class="school_no_title"> {{$item['name']}}<br> 口コミ・評判はまだありません </p>
                                        @if (session('user'))
                                            <a class="common_btn02" href="/answer/{{$item['id']}}">口コミを投稿</a>
                                        @else
                                        <button type="button" class="common_btn02 PopBtn" data-pop="Login">口コミを投稿</button>                                  
                                        @endif
                                    </div>
                                @else
                                    <div class="school_talk_block">
                                        <div class="school_talk_sub">
                                            <img src='{{asset('assets/user/images/face/good_icon02.svg')}}' alt="良い点">
                                            <p class="shcool_talk_sub_text color-good">良い点</p>
                                        </div>
                                        <div class="school_talk_main">
                                            <h3 class="school_talk_title">園庭・園舎</h3>
                                            <p class="school_talk_text">
                                                {{$item['content']}}
                                            </p>
                                        </div>
                                    </div>
                                    
                                @endif
                            </div>
                            <a href="{{ route('get.by.nurseryid', ['id' => $item['id'] ]) }}" class="school_detail_btn">詳細を見る</a>
                        </div>
                    </li>
                    @endforeach                    
                </ul>
                <div class="mypage_line"></div>
                    <h2 class="mypage_subtitle">
                        あなたにおすすめの保育園
                    </h2>
                    <ul class="mypage_school_list recommend">
                        @foreach ($recommendedData as $item)
                            <li class="mypage_school_item">
                                <div class="school_box">
                                <div class="school_info_block">
                                    @foreach ($item['facility_name'] as $facility)                                    
                                        <p class="school_label">{{$facility}}</p>
                                    @endforeach
                                    @if (session('user'))
                                        <button type="button" class="common_follow_btn FollowBtn {{isset($item['followed_id'])? 'active': ''}}" data-nursery_id="{{$item['id']}}">
                                        <img src="{{asset('assets/user/images/common/follow_add_icon.svg')}}" alt="add" class="normal_icon">
                                        <img src="{{asset('assets/user/images/common/follow_check_icon.svg')}}" alt="checked" class="active_icon">
                                        <span>フォロー</span>
                                        </button>
                                    @else
                                        <button type="button" class="common_follow_btn PopBtn" data-pop="Login">
                                        <img src="{{asset('assets/user/images/common/follow_add_icon.svg')}}" alt="add" class="normal_icon">
                                        <img src="{{asset('assets/user/images/common/follow_check_icon.svg')}}" alt="checked" class="active_icon">
                                        <span>フォロー</span>
                                        </button>
                                    @endif
                                </div>
                                <h2 class="school_title">{{$item['name']}}</h2>
                                <p class="school_place_text">
                                    {{$item['cooperate_name']}} / {{$item['address']}}
                                </p>
                                <div class="school_content_relative">
                                    @if ($item['review_count'] == 0)
                                        <div class="school_rate_block blur score_none active">
                                            <ul class="school_star_list">
                                                <li class="school_star_item">
                                                    <img src="{{asset('assets/user/images/star/star10.svg')}}" alt="star10">
                                                </li>
                                                <li class="school_star_item">
                                                    <img src="{{asset('assets/user/images/star/star10.svg')}}" alt="star10">
                                                </li>
                                                <li class="school_star_item">
                                                    <img src="{{asset('assets/user/images/star/star10.svg')}}" alt="star10">
                                                </li>
                                                <li class="school_star_item">
                                                    <img src="{{asset('assets/user/images/star/star00.svg')}}" alt="star00">
                                                </li>
                                                <li class="school_star_item">
                                                    <img src="{{asset('assets/user/images/star/star00.svg')}}" alt="star00">
                                                </li>
                                            </ul>
                                            <p class="school_rate_num">0.0</p>
                                        </div>
                                        <div class="not_enough_score school_place_text school_content_absolute" style="top: 24%; left: 0%; font-size: 13px;">
                                            <strong>十分な数の評価がありません</strong>
                                        </div>
                                    @else
                                    <div class="school_rate_block blur score_none ">
                                        <ul class="school_star_list">
                                            @php
                                                $cur_rating = $item['review_rating'];
                                            @endphp
                                            @for($i = 0;$i<5;$i++)
                                                @if ($cur_rating>=1)
                                                    <li class=school_star_item>
                                                        <img src='{{asset('assets/user/images/star/star10.svg')}}' alt='star10'>
                                                    </li>
                                                    @php $cur_rating-=1 @endphp
                                                @elseif ($cur_rating>0)
                                                    <li class=school_star_item>
                                                        <img src='{{ asset("assets/user/images/star/star0" . $cur_rating * 10 . ".svg") }}' alt='star{{ $cur_rating * 10 }}'>
                                                    </li>
                                                    @php $cur_rating-=1 @endphp
                                                @else
                                                    <li class=school_star_item>
                                                        <img src='{{asset('assets/user/images/star/star00.svg')}}' alt='star00'>
                                                    </li>
                                                @endif
                                            @endfor
                                        </ul>
                                        <p class="school_rate_num">{{$item['review_rating']}}</p>        
                                    </div>
                                    @endif
                                </div>
                                <p class="school_post_text">
                                    <img src="{{asset('assets/user/images/common/comment_icon.svg')}}" alt="talk">口コミ数<span>{{$item['review_count']}}</span>件
                                </p>
                                <div class="school_content_relative">
                                    @if ($item['review_count'] == 0)
                                        <div class="school_no_block">
                                            <p class="school_no_title"> {{$item['name']}}<br> 口コミ・評判はまだありません </p>
                                            @if (session('user'))
                                                <a class="common_btn02" href="/answer/{{$item['id']}}">口コミを投稿</a>
                                            @else
                                                <button type="button" class="common_btn02 PopBtn" data-pop="Login">口コミを投稿</button>                                  
                                            @endif
                                        </div>
                                    @else
                                        <div class="school_talk_block">
                                            <div class="school_talk_sub">
                                                <img src='{{asset('assets/user/images/face/good_icon02.svg')}}' alt="良い点">
                                                <p class="shcool_talk_sub_text color-good">良い点</p>
                                            </div>
                                            <div class="school_talk_main">
                                                <h3 class="school_talk_title">園庭・園舎</h3>
                                                <p class="school_talk_text">
                                                    {{$item['content']}}
                                                </p>
                                            </div>
                                        </div>
                                        
                                    @endif
                                </div>
                                <a href="{{ route('get.by.nurseryid', ['id' => $item['id'] ]) }}" class="school_detail_btn">詳細を見る</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    {{-- <button type="button" class="mypage_viewmore_btn recommend">
                        続きを見る<img src="/Users/apple/w/nursery/public/assets/user/images/header/logo.png" alt="more">
                    </button> --}}
                    <div class="mypage_line"></div>
                    <div class="common_inner_m common_pc">
                        <h2 class="mypage_subtitle">
                            マイページメニュー
                        </h2>
                        <div class="mypage_menu_block">
                            <div class="mypage_menu_box">
                                <h2 class="mypage_menu_title">個人設定</h2>
                                <ul class="mypage_menu_list">
                                    <li class="mypage_menu_item">
                                        <a href="/mypage/like" class="mypage_menu_link">気になる求人一覧</a>
                                    </li>
                                    <li class="mypage_menu_item">
                                        <a href="/mypage/following" class="mypage_menu_link">フォロー中の保育園一覧</a>
                                    </li>
                                    <li class="mypage_menu_item">
                                        <a href="/mypage/user/email" class="mypage_menu_link">メール配信設定</a>
                                    </li>
                                    <li class="mypage_menu_item">
                                        <a href="/mypage/password" class="mypage_menu_link">パスワード変更</a>
                                    </li>
                                    <li class="mypage_menu_item">
                                        <a href="/mypage/user" class="mypage_menu_link">ユーザー設定</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mypage_menu_box">
                                <h2 class="mypage_menu_title">口コミ関連情報</h2>
                                <ul class="mypage_menu_list">
                                    <li class="mypage_menu_item">
                                        <a href="/answer" class="mypage_menu_link">口コミ投稿</a>
                                    </li>
                                    <li class="mypage_menu_item">
                                        <a href="/mypage/draft" class="mypage_menu_link">下書き中の口コミ一覧</a>
                                    </li>
                                    <li class="mypage_menu_item">
                                        <a href="/mypage/review" class="mypage_menu_link">投稿済みの口コミ一覧</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mypage_menu_box">
                                <h2 class="mypage_menu_title">ユーザー情報</h2>
                                <ul class="mypage_menu_list">
                                    <li class="mypage_menu_item">
                                        <a href="/logout" class="mypage_menu_link">ログアウト</a>
                                    </li>
                                    <li class="mypage_menu_item">
                                        <a href="/mypage/quiet" class="mypage_menu_link">退会の手続き</a>
                                    </li>
                                </ul>
                            </div>
                        <div class="mypage_menu_box">
                            <h2 class="mypage_menu_title">会社情報・ヘルプ・その他</h2>
                            <ul class="mypage_menu_list">
                                <li class="mypage_menu_item">
                                    <a href="/terms" class="mypage_menu_link">利用規約</a>
                                </li>
                                <li class="mypage_menu_item">
                                    <a href="/policy" class="mypage_menu_link" target="_blank" rel="noopener noreferrer">個人情報の取り扱いについて</a>
                                </li>
                                <li class="mypage_menu_item">
                                    <a href="https://proreach.co.jp/" class="mypage_menu_link" target="_blank" rel="noopener noreferrer">運営会社</a>
                                </li>
                                <li class="mypage_menu_item">
                                    <a href="/guide" class="mypage_menu_link">口コミ投稿ガイドライン</a>
                                </li>
                                <li class="mypage_menu_item">
                                    <a href="/help" class="mypage_menu_link">ヘルプ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="common_campaign_block mypage">
            <div class="common_inner">   
                <div class="campaign_layout_block">
                <div class="campaign_search_block">
                    <h2 class="campaign_search_main_title">保育士による<br class="common_sp_640">口コミ・評判を探す</h2>
                    <div class="campaign_search_box">
                    <h3 class="campaign_search_title">法人名で口コミを探す</h3>
                    <a href="/company" class="campaign_search_btn">法人一覧を見る</a>
                    </div>
                    <div class="campaign_search_box">
                    <h3 class="campaign_search_title">施設形態から口コミを探す</h3>
                    <ul class="campaign_search_list" id="CampaignList">
                        @foreach ($facilityData as $row)
                        @if ($row->id<6)
                            <li class="campaign_search_item">
                            <a href="/nurseries?facility_type_ids%5B%5D={{$row->id}}" class="campaign_search_link">{{$row->name}}</a>
                            </li>                              
                        @else
                            <li class="campaign_search_item  no_active CampaignItem ">
                            <a href="/nurseries?facility_type_ids%5B%5D={{$row->id}}" class="campaign_search_link">{{$row->name}}</a>
                            </li>                          
                        @endif
                        @endforeach
                    </ul>
                    <button type="button" class="campaign_more_btn" id="CampaignBtn"><span></span></button>
                    </div>
                    <img src="{{asset('assets/user/images/character/icon07.svg')}}" alt="保育士による口コミ・評判を探す" class="campaign_search_icon">
                </div>
                <div class="campaign_post_block">
                    <h2 class="campaign_post_title">口コミを投稿する</h2>
                    <p class="campaign_post_text">
                    あなたの知っているちょっとした情報が、誰かにとっては大きな一歩を踏み出す力へと変わります。保育士の保育園選びに、助け合いの輪を広げませんか？
                    </p>
                    <div class="campaign_post_btnarea">
                    <img src="{{asset('assets/user/images/character/icon08_pc.svg')}}" alt="口コミを投稿する" class="common_pc_640 campaign_post_icon">
                    <img src="{{asset('assets/user/images/character/icon08_sp.svg')}}" alt="口コミを投稿する" class="common_sp_640 campaign_post_icon">
                    @if (session('user'))
                        <a class="campaign_post_btn" style="cursor: pointer" href="/answer">口コミを投稿</a>
                    @else
                        <div class="campaign_post_btn PopBtn" style="cursor: pointer" data-pop="Login">口コミを投稿</div>                               
                    @endif
                    </div>
                </div>
                </div>
            </div>
        </section>              
        <section class="common_area_block">
            <div class="common_inner">
            <div class="common_pc_640" >
                <h2 class="common_title01">
                    エリアから気になる保育園を見つける
                </h2>
                <div class="common_area_main">
                    <div class="common_area_box">
                        <p class="common_area_title">東京23区</p>
                        <ul class="area_list">
                        @foreach ($tokyoCityData as $row)
                        <li class="area_item">
                            <a href="/nurseries?prefecture_id={{$row->p_id}}&city_ids[]={{$row->id}}" class="area_link">{{$row->name}}</a>
                        </li>            
                        @endforeach
                        </ul>
                    </div>
                    <div class="common_area_box">
                        <p class="common_area_title">全国主要都市</p>
                            <ul class="area_list">
                            @foreach ($otherCityData as $row)
                            <li class="area_item">
                                <a href="/nurseries?prefecture_id={{$row['p_id']}}&{{$row['cityUrl']}}" class="area_link">{{$row['name']}}</a>
                            </li>            
                            @endforeach
                            </ul>
                    </div>
                </div>
                <div class="common_area_sub">
                    <ul class="common_area_list">
                        <li class="common_area_item">
                                <div class="common_area_box">
                                <p class="common_area_title">北海道・東北</p>
                                <ul class="area_list">
                                    @foreach ($prefectureData as $row)
                                    @if ($row->main_id == 1)
                                        <li class="area_item">
                                        <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                        </li>            
                                    @endif
                                    @endforeach
                                </ul>                         
                                </div>
                                <div class="common_area_box">
                                <p class="common_area_title">関東</p>
                                <ul class="area_list">
                                    @foreach ($prefectureData as $row)
                                    @if ($row->main_id == 2)
                                        <li class="area_item">
                                        <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                        </li>            
                                    @endif
                                    @endforeach
                                </ul>                        
                                </div>
                        </li>
                        <li class="common_area_item">
                            <div class="common_area_box">
                                <p class="common_area_title">信越・北陸・東海</p>
                                <ul class="area_list">
                                    @foreach ($prefectureData as $row)
                                    @if ($row->main_id == 3 || $row->main_id == 4)
                                        <li class="area_item">
                                        <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                        </li>            
                                    @endif
                                    @endforeach
                                </ul>                             
                                </div>
                                <div class="common_area_box">
                                <p class="common_area_title">近畿</p>
                                <ul class="area_list">
                                    @foreach ($prefectureData as $row)
                                    @if ($row->main_id == 5)
                                        <li class="area_item">
                                        <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                        </li>            
                                    @endif
                                    @endforeach
                                </ul>                    
                                </div>
                        </li>
                        <li class="common_area_item">
                            <div class="common_area_box">
                                <p class="common_area_title">中国・四国</p>
                                <ul class="area_list">
                                    @foreach ($prefectureData as $row)
                                    @if ($row->main_id == 6)
                                        <li class="area_item">
                                        <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                        </li>            
                                    @endif
                                    @endforeach
                                </ul>                        
                                </div>
                                <div class="common_area_box">
                                <p class="common_area_title">九州</p>
                                <ul class="area_list">
                                    @foreach ($prefectureData as $row)
                                    @if ($row->main_id == 7)
                                        <li class="area_item">
                                        <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                        </li>            
                                    @endif
                                    @endforeach
                                </ul>                          
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="common_sp_640">
                <h2 class="common_title01">
                    エリアから気になる<br>保育園を見つける
                </h2>
                <ul class="common_area-sp_list">
                    <li class="common_area-sp_item">
                        <div class="common_area-sp_head AreaBtn">
                            <p class="common_area-sp_title">東京23区</p>
                            <p class="common_area-sp_btn"></p>
                        </div>
                        <div class="common_area-sp_main">
                            <ul class="area_list">
                            @foreach ($tokyoCityData as $row)
                            <li class="area_item">
                                <a href="/nurseries?prefecture_id={{$row->p_id}}&city_ids[]={{$row->id}}" class="area_link">{{$row->name}}</a>
                            </li>            
                            @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="common_area-sp_item">
                        <div class="common_area-sp_head AreaBtn">
                            <p class="common_area-sp_title">全国主要都市</p>
                            <p class="common_area-sp_btn"></p>
                        </div>
                        <div class="common_area-sp_main">
                            <ul class="area_list">
                            @foreach ($otherCityData as $row)
                            <li class="area_item">
                                <a href="/nurseries?prefecture_id={{$row['p_id']}}&{{$row['cityUrl']}}" class="area_link">{{$row['name']}}</a>
                            </li>            
                            @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="common_area-sp_item">
                        <div class="common_area-sp_head AreaBtn">
                            <p class="common_area-sp_title">北海道・東北</p>
                            <p class="common_area-sp_btn"></p>
                        </div>
                        <div class="common_area-sp_main">
                            <ul class="area_list">
                                @foreach ($prefectureData as $row)
                                @if ($row->main_id == 1)
                                    <li class="area_item">
                                    <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                    </li>            
                                @endif
                                @endforeach
                            </ul>                     
                            </div>
                    </li>
                    <li class="common_area-sp_item">
                        <div class="common_area-sp_head AreaBtn">
                            <p class="common_area-sp_title">関東</p>
                            <p class="common_area-sp_btn"></p>
                        </div>
                        <div class="common_area-sp_main">
                            <ul class="area_list">
                                @foreach ($prefectureData as $row)
                                @if ($row->main_id == 2)
                                    <li class="area_item">
                                    <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                    </li>            
                                @endif
                                @endforeach
                            </ul>                   
                            </div>
                    </li>
                    <li class="common_area-sp_item">
                        <div class="common_area-sp_head AreaBtn">
                            <p class="common_area-sp_title">信越・北陸・東海</p>
                            <p class="common_area-sp_btn"></p>
                        </div>
                        <div class="common_area-sp_main">
                            <ul class="area_list">
                                @foreach ($prefectureData as $row)
                                @if ($row->main_id == 3 || $row->main_id == 4)
                                    <li class="area_item">
                                    <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                    </li>            
                                @endif
                                @endforeach
                            </ul>                     
                        </div>
                    </li>
                    <li class="common_area-sp_item">
                        <div class="common_area-sp_head AreaBtn">
                            <p class="common_area-sp_title">近畿</p>
                            <p class="common_area-sp_btn"></p>
                        </div>
                        <div class="common_area-sp_main">
                            <ul class="area_list">
                                @foreach ($prefectureData as $row)
                                @if ($row->main_id == 5)
                                    <li class="area_item">
                                    <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                    </li>            
                                @endif
                                @endforeach
                            </ul>                       
                            </div>
                    </li>
                    <li class="common_area-sp_item">
                        <div class="common_area-sp_head AreaBtn">
                            <p class="common_area-sp_title">中国・四国</p>
                            <p class="common_area-sp_btn"></p>
                        </div>
                            <div class="common_area-sp_main">
                                <ul class="area_list">
                                @foreach ($prefectureData as $row)
                                    @if ($row->main_id == 6)
                                    <li class="area_item">
                                        <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                    </li>            
                                    @endif
                                @endforeach
                                </ul>                
                        </div>
                    </li>
                    <li class="common_area-sp_item">
                        <div class="common_area-sp_head AreaBtn">
                            <p class="common_area-sp_title">九州・沖縄</p>
                            <p class="common_area-sp_btn"></p>
                        </div>
                        <div class="common_area-sp_main">
                            <ul class="area_list">
                                @foreach ($prefectureData as $row)
                                @if ($row->main_id == 7)
                                <li class="area_item">
                                    <a href="/nurseries?prefecture_id={{$row->id}}" class="area_link">{{$row->name}}</a>
                                </li>            
                                @endif
                            @endforeach
                            </ul>                    
                        </div>
                    </li>
                </ul>
            </div>
            </div>
        </section>       
        <div class="common_pc">
        </div>
        <div class="common_sp">
            <a href="/mypage" class="common_btn01 center w300">マイページトップへ</a>
        </div>
    </div>
</main>


@endsection