@extends('layout')
  
@section('content')

@php
    $evaluation_name = array('園庭・園舎', '職員同士の人間関係', '主任・園長との人間関係', '保護者との人間関係', '給与・福利厚生', 'シフトの融通', '業務量', '保育方針');
    $contract_name = array('正社員', '契約・派遣社員', 'パート・アルバイト', 'その他');
    $work_period = array('2001-2005', '2006-2010', '2011-2015', '2016-2020', '2021~', 'other');
@endphp
<main class="common_main">
    <div class="school-d_wrap">
        <div class="school-d_inner">
            <div class="common_inner">
                <div class="school-d_mv_block">
                    <div class="school-d_mv_main">
                        <div class="pankuzu_block">
                            <ul class="pankuzu_list">
                                <li class="pankuzu_item">
                                    <a href="/" class="pankuzu_link">ホーム</a>
                                </li>
                                <li class="pankuzu_item">
                                    <a href="/nurseries?prefecture_id={{$nurseryData['prefecture_id']}}" class="pankuzu_link">{{$nurseryData['prefecture_name']}}</a>
                                </li>
                                <li class="pankuzu_item">
                                    {{$nurseryData['city_name']}}
                                </li>
                            </ul>
                        </div>
                        <p class="school-d_mv_label">{{$nurseryData['facility_name']}}</p>
                        <h1 class="school-d_mv_title">{{$nurseryData['name']}}</h1>
                        <p class="school-d_mv_place">{{$nurseryData['prefecture_name']}}{{$nurseryData['city_name']}}{{$nurseryData['address']}}</p>
                        <div class="school_content_relative sp_marginbt_school">
                            <div class="school-d_mv_rate ">
                                <p class="school-d_mv_rate_title">総合評価 :</p>
                                <ul class="school_star_list">
                                    @php
                                        $cur_rating = number_format($nurseryData['review_rating'], 1) ;
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
                                <p class="school-d_mv_rate_num">{{number_format($nurseryData['review_rating'], 1)}}</p>
                            </div>
                        </div>
                        <div class="company-banner-sp">
                            <a href="/answer" target="_blank" rel="noopener noreferrer" class="top_mv_bnr_block">
                                <img src="{{asset('assets/user/images/top/banner_sp_march.png')}}" alt="オープン記念キャンペーン" class="common_sp_640">
                            </a>
                        </div>
                        <ul class="school-d_mv_rank_list">
                            <li class="school-d_mv_rank_item"></li>
                        </ul>
                        <div class="common_sp">
                            <div class="school-d_mv_graph school_content_relative">
                                <img src="{{asset('assets/user/images/school/detail/character01.svg')}}" alt="保育ひろば" class="school-d_mv_character">
                                <div class="school-d_mv_graph_box not_compare_with_prefecture_ave active  ">
                                    <div class="school-d_mv_graph_main">
                                        <div class="school-d_mv_graph_pic">
                                            <div class="school-d_mv_graph_canvas">
                                                <canvas id="myChart03"></canvas>
                                            </div>
                                            <div class="school-d_graph_text_box">
                                                <div class="school-d_graph_textarea posi01">
                                                    <p class="graph_title">
                                                        職員同士の<br />人間関係
                                                    </p>
                                                    <p class="graph_num  color_red ">4.0</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi02">
                                                    <p class="graph_title">
                                                        管理職との<br />人間関係
                                                    </p>
                                                    <p class="graph_num  color_red ">5.0</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi03">
                                                    <p class="graph_title">
                                                        保護者との<br />人間関係
                                                    </p>
                                                    <p class="graph_num  color_red ">4.0</p>                                                  
                                                </div>
                                                <div class="school-d_graph_textarea posi04">
                                                    <p class="graph_title">シフトの<br />融通</p>
                                                    <p class="graph_num ">3.5</p>                                                  
                                                </div>
                                                <div class="school-d_graph_textarea posi05">
                                                    <p class="graph_title">園庭・園舎</p>
                                                    <p class="graph_num  color_red ">5.0</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi06">
                                                    <p class="graph_title">業務量</p>
                                                    <p class="graph_num ">2.5</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi07">
                                                    <p class="graph_title">保育方針</p>
                                                    <p class="graph_num  color_red ">5.0</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi08">
                                                    <p class="graph_title">給料<br />福利厚生</p>
                                                    <p class="graph_num  color_red ">4.0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="school-d_mv_graph_btn" >
                                        <span>東京都平均との比較をみる</span>
                                    </button>
                                </div>
                                <div class="school-d_mv_graph_box compare_with_prefecture_ave ">
                                    <div class="school-d_mv_graph_main">
                                        <div class="school-d_mv_graph_pic average_pic">
                                            <div class="school-d_mv_graph_canvas">
                                                <canvas id="myChart04"></canvas>
                                            </div>
                                            <div class="school-d_graph_text_box">
                                                <div class="school-d_graph_textarea posi01">
                                                    <p class="graph_title">
                                                        職員同士の<br />人間関係
                                                    </p>
                                                    <p class="graph_num  color_red ">4.0</p>
                                                    <p class="graph_average">県平均：3.2</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi02">
                                                    <p class="graph_title">
                                                        管理職との<br />人間関係
                                                    </p>
                                                    <p class="graph_num  color_red ">5.0</p>
                                                    <p class="graph_average">県平均：2.8</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi03">
                                                    <p class="graph_title">
                                                        保護者との<br />人間関係
                                                    </p>
                                                    <p class="graph_num  color_red ">4.0</p>
                                                    <p class="graph_average">県平均：3.7</p>
                                                </div>
                                                    <div class="school-d_graph_textarea posi04">
                                                    <p class="graph_title">シフトの<br />融通</p>
                                                    <p class="graph_num ">3.5</p>
                                                    <p class="graph_average">県平均：3.4</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi05">
                                                    <p class="graph_title">園庭・園舎</p>
                                                    <p class="graph_num  color_red ">5.0</p>
                                                    <p class="graph_average">県平均：3.4</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi06">
                                                    <p class="graph_title">業務量</p>
                                                    <p class="graph_num ">2.5</p>
                                                    <p class="graph_average">県平均：3.1</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi07">
                                                    <p class="graph_title">保育方針</p>
                                                    <p class="graph_num  color_red ">5.0</p>
                                                    <p class="graph_average">県平均：3.1</p>
                                                </div>
                                                <div class="school-d_graph_textarea posi08">
                                                    <p class="graph_title">給料<br />福利厚生</p>
                                                    <p class="graph_num  color_red ">4.0</p>
                                                    <p class="graph_average">県平均：3.2</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="school-d_mv_graph_sub">
                                        <p class="school-d_mv_graph_text">
                                            <span class="box_color01"></span>アンジェリカ東品川保育園
                                        </p>
                                        <p class="school-d_mv_graph_text">
                                            <span class="box_color02"></span>東京都平均
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <ul class="school-d_mv_info_list">
                            <li class="school-d_mv_info_item">
                                <p class="school-d_mv_info_title">
                                    <img src="{{asset('assets/user/images/school/detail/talk_icon.svg')}}" alt="口コミ数">口コミ数 :
                                </p>
                                <p class="school-d_mv_info_text">
                                    <span>{{$nurseryData['review_count']}}</span>件
                                </p>
                            </li>
                            <li class="school-d_mv_info_item">
                                <p class="school-d_mv_info_title">
                                    <img src="{{asset('assets/user/images/school/detail/time_icon.svg')}}" alt="平均残業時間">平均残業時間 :
                                </p>
                                <p class="school-d_mv_info_text">
                                    <span>{{$nurseryData['review_hour']*0.5}}</span>時間/日
                                </p>
                            </li>
                        </ul>
                        <div class="school-d_mv_btnarea">
                            <a href="/answer/{{$nurseryData['id']}}" class="school-d_mv_post_btn">
                                口コミを投稿<img src="{{asset('assets/user/images/school/detail/btn_icon.svg')}}" alt="口コミを投稿">
                            </a>
                            <div class="school-d_mv_follow">
                                <button 
                                    type="button"
                                    class="school-d_mv_follow_btn FollowBtn {{isset($nurseryData['follow_id'])?'active':''}}"
                                    data-nursery_id="{{$nurseryData['id']}}"
                                >
                                    <img src="{{asset('assets/user/images/school/detail/add_icon.svg')}}" alt="add" class="normal_icon">
                                    <img src="{{asset('assets/user/images/common/follow_check_icon.svg')}}" alt="check" class="active_icon">
                                    <span>フォロー</span>
                                </button>
                                <p class="school-d_mv_follow_text">※新着の口コミ・求人情報をメールでお知らせします</p>
                            </div>
                        </div>
                    </div>
                    <div class="school-d_mv_sub">
                        <div class="school-d_mv_graph school_content_relative">
                            <img src="{{asset('assets/user/images/school/detail/character01.svg')}}" alt="保育ひろば" class="school-d_mv_character">
                            <div class="school-d_mv_graph_box not_compare_with_prefecture_ave active {{count($reviewTypeData)==8? ' ': 'blur_active'}}">
                                <div class="school-d_mv_graph_main">
                                    <div class="school-d_mv_graph_pic">
                                        <div class="school-d_mv_graph_canvas">
                                            <canvas id="myChart01"></canvas>
                                        </div>
                                        <div class="school-d_graph_textarea posi01">
                                            <p class="graph_title">職員同士の<br />人間関係</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[1])? $reviewTypeData[1]->review_rating: 0.0}}</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi02">
                                            <p class="graph_title">管理職との<br />人間関係</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[2])? $reviewTypeData[2]->review_rating: 0.0}}</p>                                            
                                        </div>
                                        <div class="school-d_graph_textarea posi03">
                                            <p class="graph_title">保護者との<br />人間関係</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[3])? $reviewTypeData[3]->review_rating: 0.0}}</p>                                            
                                        </div>
                                        <div class="school-d_graph_textarea posi04">
                                            <p class="graph_title">シフトの<br />融通</p>
                                            <p class="graph_num ">{{isset($reviewTypeData[5])? $reviewTypeData[5]->review_rating: 0.0}}</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi05">
                                            <p class="graph_title">園庭・園舎</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[0])? $reviewTypeData[0]->review_rating: 0.0}}</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi06">
                                            <p class="graph_title">業務量</p>
                                            <p class="graph_num ">{{isset($reviewTypeData[6])? $reviewTypeData[6]->review_rating: 0.0}}</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi07">
                                            <p class="graph_title">保育方針</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[7])? $reviewTypeData[7]->review_rating: 0.0}}</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi08">
                                            <p class="graph_title">給料<br />福利厚生</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[4])? $reviewTypeData[4]->review_rating: 0.0}}</p>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="school-d_mv_graph_btn" >
                                    <span>東京都平均との比較</span>
                                </button>
                            </div>
                            <div class="school-d_mv_graph_box compare_with_prefecture_ave ">
                                <div class="school-d_mv_graph_main">
                                    <div class="school-d_mv_graph_pic average_pic">
                                        <div class="school-d_mv_graph_canvas">
                                            <canvas id="myChart02"></canvas>
                                        </div>
                                        <div class="school-d_graph_textarea posi01">
                                            <p class="graph_title">職員同士の<br />人間関係</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[1])? $reviewTypeData[1]->review_rating: 0.0}}</p>
                                            <p class="graph_average">県平均：3.2</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi02">
                                            <p class="graph_title">管理職との<br />人間関係</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[2])? $reviewTypeData[2]->review_rating: 0.0}}</p>
                                            <p class="graph_average">県平均：2.8</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi03">
                                            <p class="graph_title">保護者との<br />人間関係</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[3])? $reviewTypeData[3]->review_rating: 0.0}}</p>
                                            <p class="graph_average">県平均：3.7</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi04">
                                            <p class="graph_title">シフトの<br />融通</p>
                                            <p class="graph_num ">{{isset($reviewTypeData[5])? $reviewTypeData[5]->review_rating: 0.0}}</p>
                                            <p class="graph_average">県平均：3.4</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi05">
                                            <p class="graph_title">園庭・園舎</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[0])? $reviewTypeData[0]->review_rating: 0.0}}</p>
                                            <p class="graph_average">県平均：3.4</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi06">
                                            <p class="graph_title">業務量</p>
                                            <p class="graph_num ">{{isset($reviewTypeData[6])? $reviewTypeData[6]->review_rating: 0.0}}</p>
                                            <p class="graph_average">県平均：3.1</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi07">
                                            <p class="graph_title">保育方針</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[7])? $reviewTypeData[7]->review_rating: 0.0}}</p>
                                            <p class="graph_average">県平均：3.1</p>
                                        </div>
                                        <div class="school-d_graph_textarea posi08">
                                            <p class="graph_title">給料<br />福利厚生</p>
                                            <p class="graph_num  color_red ">{{isset($reviewTypeData[4])? $reviewTypeData[4]->review_rating: 0.0}}</p>
                                            <p class="graph_average">県平均：3.2</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="school-d_mv_graph_sub">
                                    <p class="school-d_mv_graph_text">
                                        <span class="box_color01"></span>{{$nurseryData['name']}}
                                    </p>
                                    <p class="school-d_mv_graph_text">
                                        <span class="box_color02"></span>東京都平均
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="company-banner-pc">
                    <a href="/answer" target="_blank" rel="noopener noreferrer" class="top_mv_bnr_block">
                        <img src="{{asset('assets/user/images/top/banner_pc_march.png')}}" alt="オープン記念キャンペーン" class="common_pc_640">
                    </a>
                </div>
                <section class="school-d_cat_block">
                    <h1 class="common_title02">
                        <span>アンジェリカ東品川保育園の</span>
                        カテゴリー別口コミ・評判
                    </h1>
                    <ul class="school-d_btn_list">
                        @for($i=1;$i<=8;$i++)
                            @php
                                $flag = 0;
                            @endphp
                            @foreach ($reviewTypeData as $item)
                                @if ($item->id == $i)
                                    <li class="school-d_btn_item">
                                        <a href="/nurseries/{{$nurseryData['id']}}?evaluation_ids%5B%5D={{$i}}" class="school-d_btn_link">
                                            <img src="{{asset('assets/user/images/school/detail/cat_icon07.svg')}}" alt="{{$evaluation_name[$i-1]}}">{{$evaluation_name[$i-1]}} ({{$item->review_count}}件)
                                        </a>
                                    </li>   
                                    @php
                                        $flag = 1;
                                    @endphp        
                                @endif
                            @endforeach
                            @if ($flag == 0)
                            <li class="school-d_btn_item">
                                <a href="/nurseries/{{$nurseryData['id']}}?evaluation_ids%5B%5D={{$i}}" class="school-d_btn_link">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon07.svg')}}" alt="">{{$evaluation_name[$i-1]}}(0件)
                                </a>
                            </li>   
                            @endif
                            @php
                                $flag = 0;
                            @endphp
                        @endfor
                    </ul>
                </section>
                <section class="school-d_type_block">
                    <h1 class="common_title02">
                        <span>アンジェリカ東品川保育園の</span>
                        雇用形態別口コミ・評判
                    </h1>
                    <ul class="school-d_btn_list">
                        @for($i=1;$i<=4;$i++)
                            @php
                                $flag = 0;
                            @endphp
                            @foreach ($contractTypeData as $item)
                                @if ($item->id == $i)
                                    <li class="school-d_btn_item">
                                        <a href="/nurseries/{{$nurseryData['id']}}?contract_types%5B%5D={{$i}}" class="school-d_btn_link">
<<<<<<< HEAD
                                            <img src="{{asset('assets/user/images/school/detail/cat_icon07.svg')}}" alt="{{$contract_name[$i%4]}}">{{$contract_name[$i%4]}} ({{$item->review_count}}件)
=======
                                            <img src="{{asset('assets/user/images/school/detail/cat_icon07.svg')}}" alt="{{$contract_name[$i-1]}}">{{$contract_name[$i-1]}} ({{$item->review_count}}件)
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                        </a>
                                    </li>   
                                    @php
                                        $flag = 1;
                                    @endphp        
                                @endif
                            @endforeach
                            @if ($flag == 0)
                            <li class="school-d_btn_item">
                                <a href="/nurseries/{{$nurseryData['id']}}?contract_types%5B%5D={{$i}}" class="school-d_btn_link">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon07.svg')}}" alt="">{{$contract_name[$i%4]}}(0件)
=======
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon07.svg')}}" alt="">{{$contract_name[$i-1]}}(0件)
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                </a>
                            </li>   
                            @endif
                            @php
                                $flag = 0;
                            @endphp
                        @endfor
                    </ul>
                </section>
            </div>
         </div>
        <section class="school-d_main_block" id="kyuujin_anker">
            <div class="common_inner">
                <div class="school-d_tab_block">
                    <ul class="school-d_tab_list">
                        <li class="school-d_tab_item  active " data-tab="Tab01">口コミ・評判<span>{{$nurseryData['review_count']}}</span></li>
                        <li class="school-d_tab_item " data-tab="Tab02">求人情報<span>0</span></li>
                    </ul>
                    <img src="{{asset('assets/user/images/school/detail/character02.svg')}}" alt="口コミ・評判・求人情報" class="school-d_tab_icon">
                </div>
                <div class="school-d_target_block">
                    <div class="school-d_target_box Tab01  active ">
                        <div class="school-d_post_layout">
                            <aside class="school-d_post_aside">
                                <form method="get" class="search_form" id="searchNurseryShow" action="/nurseries/{{$nurseryData['id']}}">
                                    <input type="hidden" name="sort" value="">
                                    <h3 class="school-d_post_search_title">条件を絞り込む</h3>
                                    <div class="school-d_aside_keyword">
                                        <input type="text" name="keyword" class="school-d_aside_input" placeholder="キーワードを入力" value="">
                                        <button type="submit" class="school-d_aside_search_btn">
                                            <img src="{{asset('assets/user/images/school/detail/search_icon.svg')}}" alt="search">
                                        </button>
                                    </div>
                                    <div class="school-d_post_aside_box">
                                        <p class="school-d_post_aside_title">雇用形態</p>
                                        <ul class="school-d_post_aside_list">
                                            @for($i=1;$i<=4;$i++)
                                                @php
                                                    $flag = 0;
                                                    // $contract_name = array('正社員', '契約・派遣社員', 'パート・アルバイト', 'その他');
                                                @endphp
                                                @foreach ($contractTypeData as $item)
                                                    @if ($item->id == $i)
                                                        <li class="school-d_post_aside_item">
                                                            <label class="school-d_post_check_label">
                                                                <input type="checkbox" name="contract_types[]" value="{{$i}}">
<<<<<<< HEAD
                                                                <p class="school-d_post_check_text">{{$contract_name[$i%4]}}({{$item->review_count}}件)</p>
=======
                                                                <p class="school-d_post_check_text">{{$contract_name[$i-1]}}({{$item->review_count}}件)</p>
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                                            </label>
                                                        </li>
                                                        @php
                                                            $flag = 1;
                                                        @endphp        
                                                    @endif
                                                @endforeach
                                                @if ($flag == 0)
                                                <li class="school-d_post_aside_item">
                                                    <label class="school-d_post_check_label">
                                                        <input type="checkbox" name="contract_types[]" value="{{$i}}" disabled >
                                                        <p class="school-d_post_check_text">正社員(0件)</p>
                                                    </label>
                                                </li> 
                                                @endif
                                                @php
                                                    $flag = 0;
                                                @endphp
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="school-d_post_aside_box">
                                        <p class="school-d_post_aside_title">性別</p>
                                        <ul class="school-d_post_aside_list">
                                            <li class="school-d_post_aside_item">
                                                <label class="school-d_post_check_label">
                                                    <input type="checkbox" name="genders[]" value="1" disabled >
                                                    <p class="school-d_post_check_text">男性(0件)</p>
                                                </label>
                                            </li>
                                            <li class="school-d_post_aside_item">
                                                <label class="school-d_post_check_label">
                                                    <input type="checkbox" name="genders[]" value="2">
<<<<<<< HEAD
                                                    <p class="school-d_post_check_text">女性({{$nurseryData['review_count']}}件)</p>
=======
                                                    <p class="school-d_post_check_text">女性(8件)</p>
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="school-d_post_aside_box">
                                        <p class="school-d_post_aside_title">
                                            <span>アンジェリカ東品川保育園 の</span>
                                            カテゴリー別口コミ・評判
                                        </p>
                                        <ul class="school-d_post_aside_list">
                                            @for($i=1;$i<=8;$i++)
                                                @php
                                                    $flag = 0;
                                                    // $evaluation_name = array('園庭・園舎', '職員同士の人間関係', '主任・園長との人間関係', '保護者との人間関係', '給与・福利厚生', 'シフトの融通', '業務量', '保育方針');
                                                @endphp
                                                @foreach ($reviewTypeData as $item)
                                                    @if ($item->id == $i)
                                                        <li class="school-d_post_aside_item">
                                                            <label class="school-d_post_check_label">
                                                                <input type="checkbox" name="evaluation_ids[]" value="{{$i}}">
                                                                <p class="school-d_post_check_text">
                                                                    <img src="{{ asset("assets/user/images/school/detail/cat_icon0{$i}.svg") }}" alt="園庭・園舎" class="normal">
                                                                    <img src="{{ asset("assets/user/images/school/detail/cat_icon0{$i}_active.svg") }}" alt="園庭・園舎" class="active">
                                                                    {{$evaluation_name[$i-1]}} ({{$item->review_count}}件)
                                                                </p>
                                                            </label>
                                                        </li>
                                                        @php
                                                            $flag = 1;
                                                        @endphp        
                                                    @endif
                                                @endforeach
                                                @if ($flag == 0 && count($reviewTypeData)!=0)
                                                    <li class="school-d_post_aside_item">
                                                        <label class="school-d_post_check_label">
                                                            <input type="checkbox" name="evaluation_ids[]" value="{{$i}}" disabled>
                                                            <p class="school-d_post_check_text">
                                                                <img src="{{ asset("assets/user/images/school/detail/cat_icon0{$i}.svg") }}" alt="園庭・園舎" class="normal">
                                                                <img src="{{ asset("assets/user/images/school/detail/cat_icon0{$i}_active.svg") }}" alt="園庭・園舎" class="active">
<<<<<<< HEAD
                                                                {{$evaluation_name[$i-1]}} (0件)
=======
                                                                {{$evaluation_name[$i-1]}} ({{$item->review_count}}件)
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                                            </p>
                                                        </label>
                                                    </li>

                                                @endif
                                                @php
                                                    $flag = 0;
                                                @endphp
                                            @endfor
                                        </ul>
                                    </div>
                                    <button type="submit" class="common_btn02" style="margin-top: 50px;">条件を確定する</button>
                                </form>
                            </aside>
                            <div class="school-d_post_main">
                                <div class="school-d_post_result_block">
                                    <h2 class="school-d_post_result_title">
<<<<<<< HEAD
                                        <img src="{{ asset("assets/user/images/school/detail/character03.svg") }}" alt="口コミ・評判">
=======
                                        <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/character03.svg" alt="口コミ・評判">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                        <span>
                                            <small>アンジェリカ東品川保育園の</small>
                                            口コミ・評判(8件)
                                        </span>
                                    </h2>
                                    <div class="common_sp">
<<<<<<< HEAD
                                        <form method="get" class="search_form" action="nurseries/{{$nurseryData['id']}}">
=======
                                        <form method="get" class="search_form" action="https://hoikuhiroba-kuchikomi.com/nurseries/9453/kuchikomi">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                            <h3 class="school-d_post_search_title">条件を絞り込む</h3>
                                            <div class="school-d_post_keyword_block">
                                                <div class="school-d_aside_keyword">
                                                    <input type="text" name="keyword" class="school-d_aside_input" placeholder="キーワードを入力" value="">
                                                    <button type="submit" class="school-d_aside_search_btn">
<<<<<<< HEAD
                                                        <img src="{{ asset("assets/user/images/school/detail/search_icon.svg") }}" alt="search">
                                                    </button>
                                                </div>
                                                <button type="button" class="school-d_post_search_btn PopBtn" data-pop="Search">
                                                    <img src="{{ asset("assets/user/images/school/search_btn.svg") }}" alt="search">
=======
                                                        <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/search_icon.svg" alt="search">
                                                    </button>
                                                </div>
                                                <button type="button" class="school-d_post_search_btn PopBtn" data-pop="Search">
                                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/search_btn.svg" alt="search">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                                </button>
                                            </div>
                                        </form>
                                        <p class="school-d_post_result_text" style="display: none;">
                                            雇用形態：正社員
                                        </p>
                                    </div>
                                    <div class="school-d_post_select_block">
                                        <p class="school-d_post_select_title">表示順</p>
                                        <select name="sort" class="school-d_post_select">
                                            <option value="score"  selected >高評価順</option>
                                            <option value="score_low" >低評価順</option>
                                            <option value="created_at" >新着順</option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="school-d_post_list">
                                    @foreach ($reviewData as $item)
                                    <li class="school-d_post_item" data-inview_evaluation_id="{{$item->review_type}}" data-offset="-400" data-nursery_id="{{$nurseryData['id']}}">
                                        <div class="school-d_post_head">
                                            <div class="school-d_post_head_main">
                                                <p class="school-d_post_head_subtitle">
                                                    {{$item->nursery_name}}の口コミ・評判
                                                </p>
                                                <div class="school-d_post_head_title_block">
                                                    <h3 class="school-d_post_head_title">{{$evaluation_name[$item->review_type-1]}}</h3>
                                                    @if ($item->rating>2.5)
                                                    <p class="school-d_post_head_text  good-color ">
                                                        <img src="{{ asset("assets/user/images/school/detail/face_icon01.svg") }}" alt="良い点">良い点
                                                    </p>
                                                    @else
                                                    <p class="school-d_post_head_text  bad-color ">
                                                        <img src="{{ asset("assets/user/images/school/detail/face_icon02.svg") }}" alt="良い点">改善点
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="school-d_post_head_sub">
                                                <p class="school-d_post_head_rate_title">評価 :</p>
                                                <div class="school-d_post_head_rate">
                                                    <ul class="school_star_list">
                                                        @php
                                                            $cur_rating = $item->rating;
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
                                                    <p class="school-d_post_head_rate_num">{{number_format($item->rating,1)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="school-d_post_info">
<<<<<<< HEAD
                                            <span>{{$item->user_name}}(女性・{{$contract_name[$item->employment%4]}})</span><span>勤務時期:{{$work_period[$item->workperiod%6]}}</span>
=======
                                            <span>{{$item->user_name}}(女性・{{$contract_name[$item->employment-1]}})</span><span>勤務時期:{{$work_period[$item->workperiod-1]}}</span>
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                        </p>
                                        <div class="school-d_post_box">
                                            <div class="common_pc_640">
                                                <p class="school-d_post_text PostText">
                                                    <span data-text="{{$item->content}}">{{$item->content}}</span>
                                                    <button type="button" class="school-d_post_read_more ReadMoreBtn">もっと見る</button>
                                                </p>
                                            </div>
                                            <div class="common_sp_640">
                                                <p class="school-d_post_text PostText">
                                                    <span data-text="{{$item->content}}">{{$item->content}}</span>
                                                    <button type="button" class="school-d_post_read_more ReadMoreBtn">もっと見る</button>
                                                </p>
                                            </div>
                                        
                                            <div class="school-d_post_read_box PopBtn" data-pop="Read" style="display: none;">
                                                <p class="school-d_post_text">
                                                    {{$item->content}}
                                                </p>
                                                <p class="school-d_post_read_title">
                                                    閲覧にはいずれかを選択してください
                                                </p>
                                                <div class="school-d_post_read_btnarea">
                                                    <p class="school-d_post_read_text01">口コミの投稿</p>
                                                    <p class="school-d_post_read_text02">転職サービスに登録</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="school-d_post_btnarea">
                                            <button type="button" class="school-d_post_like_btn LikeBtn {{isset($item->like_id)? 'active': ''}}" data-evaluation_id="{{$item->id}}">
                                                <img src="{{asset('assets/user/images/school/detail/like_icon.svg')}}" alt="like" class="normal">
                                                <img src="{{asset('assets/user/images/school/detail/like_icon_active.svg')}}" alt="like" class="active">
                                                <span>いいね！</span>
                                                <small>{{isset($item->like_id)? 1:0}}</small>
                                            </button>
                                            <button type="button" class="shool-d_post_report_btn PopBtn" data-pop="Report" data-evaluation_id="{{$item->id}}">
                                                報告する
                                            </button>
                                        </div>
                                    </li>                                        
                                    @endforeach
                                </ul>
                            </div>
                         </div>
                    </div>
                    <div class="school-d_target_box Tab02 ">
                        <div class="school-d_recruit_layout">
                            <div class="school-d_recruit_main">
                                <h2 class="school-d_recruit_title">
                                    <img src="{{asset('assets/user/images/school/detail/character05.svg')}}" alt="求人情報">
                                    <span>
                                        <small>アンジェリカ東品川保育園の</small>
                                        求人情報(0件)
                                    </span>
                                </h2>
                                <ul class="school-d_recruit_list">
                                </ul>
                            </div>
                            <aside class="school-d_recruit_aside">
                                <h2 class="school-d_recruit_aside_title">
<<<<<<< HEAD
                                    <img src="{{ asset("assets/user/images/school/detail/character06.svg") }}" alt="詳細情報">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/character06.svg" alt="詳細情報">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    <span>
                                        <small>アンジェリカ東品川保育園の</small>
                                        詳細情報
                                    </span>
                                </h2>
                                <ul class="school-d_recruit_aside_list">
                                    <li class="school-d_recruit_aside_item">
                                        <h3 class="school-d_recruit_aside_subtitle">園名</h3>
                                        <p class="school-d_recruit_aside_text">
                                            アンジェリカ東品川保育園
                                        </p>
                                    </li>
                                    <li class="school-d_recruit_aside_item">
                                        <h3 class="school-d_recruit_aside_subtitle">施設形態</h3>
                                        <p class="school-d_recruit_aside_text">
                                            認可保育園
                                        </p>
                                    </li>
                                    <li class="school-d_recruit_aside_item">
                                        <h3 class="school-d_recruit_aside_subtitle">運営</h3>
                                        <p class="school-d_recruit_aside_text">
                                            株式会社
                                        </p>
                                    </li>
                                    <li class="school-d_recruit_aside_item">
                                        <h3 class="school-d_recruit_aside_subtitle">アクセス</h3>
                                        <p class="school-d_recruit_aside_text">
                                            
                                        </p>
                                    </li>
                                    <li class="school-d_recruit_aside_item">
                                        <h3 class="school-d_recruit_aside_subtitle">受動喫煙対策</h3>
                                        <p class="school-d_recruit_aside_text">
                                            あり：敷地内禁煙
                                        </p>
                                    </li>
                                    <li class="school-d_recruit_aside_item">
                                        <h3 class="school-d_recruit_aside_subtitle">運営元法人情報</h3>
                                        <p class="school-d_recruit_aside_text">
                                            株式会社WITHホールディングス<br>
                                            埼玉県 川口市 飯塚1-2-16<br>
                                            <a href="https://withgroup-recruit.jp/" target="_blank" rel="noopener noreferrer">https://withgroup-recruit.jp/</a>
                                        </p>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<section class="school-d_others_block">
    <div class="common_inner">
        <h1 class="common_title02">
            <span>アンジェリカ東品川保育園から</span>
            お近くの保育園
        </h1>
        <div class="school-d_others_main">
<<<<<<< HEAD
            <img src="{{ asset("assets/user/images/school/detail/character04.svg") }}" alt="お近くの保育園" class="school-d_others_icon">
=======
            <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/character04.svg" alt="お近くの保育園" class="school-d_others_icon">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
            <ul class="school-d_others_list">
                @foreach ($nearNurseryData as $item)
                    <li class="school-d_others_item">
                        <div class="school_box">
                        <div class="school_info_block">
                            @foreach ($item['facility_name'] as $facility)                                    
                                <p class="school_label">{{$facility}}</p>
                            @endforeach
                            {{-- <button type="button" class="common_follow_btn PopBtn" data-pop="Login">
                                <img src="{{asset('assets/user/images/common/follow_add_icon.svg')}}" alt="add" class="normal_icon">
                                <img src="{{asset('assets/user/images/common/follow_check_icon.svg')}}" alt="checked" class="active_icon">
                                <span>フォロー</span>
                            </button> --}}
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
        </div>
</div>
</section>
<section class="common_qa_block school-d">
    <div class="common_inner">
        <h2 class="common_title01">よくあるご質問</h1>
        <ul class="qa_list">
            <li class="qa_item">
                <div class="qa_quest_block QABtn">
                    <p class="qa_quest_icon">Q.</p>
                    <h3 class="qa_quest_title">
                        アンジェリカ東品川保育園で働く保育士の残業時間を知りたいです。
                    </h3>
                </div>
                <div class="qa_answer_block">
                    <p class="qa_answer_text">
                        <span class="qa_answer_icon">A.</span>
                        <span>アンジェリカ東品川保育園に実際に働いたことがある保育士の残業時間は1日あたり0.5時間です。</span>
                    </p>
                </div>
            </li>
            <li class="qa_item">
                <div class="qa_quest_block QABtn">
                    <p class="qa_quest_icon">Q.</p>
                    <h3 class="qa_quest_title">
                        アンジェリカ東品川保育園の保育士同士や園長、保護者との人間関係は分かりますか？
                    </h3>
                </div>
                <div class="qa_answer_block">
                    <p class="qa_answer_text">
                        <span class="qa_answer_icon">A.</span>
                        <span>アンジェリカ東品川保育園に実際に働いたことがある保育士が人間関係に関して3件口コミを投稿しています。</span>
                    </p>
                </div>
            </li>
            <li class="qa_item">
                <div class="qa_quest_block QABtn">
                    <p class="qa_quest_icon">Q.</p>
                    <h3 class="qa_quest_title">
                        保育士の口コミ・評判を見るのは無料でできますか？
                    </h3>
                </div>
                <div class="qa_answer_block">
                    <p class="qa_answer_text">
                        <span class="qa_answer_icon">A.</span>
                        <span>はい、無料ですべての口コミをご覧いただけます。</span>
                    </p>
                </div>
            </li>
            <li class="qa_item">
                <div class="qa_quest_block QABtn">
                    <p class="qa_quest_icon">Q.</p>
                    <h3 class="qa_quest_title">
                        保育士口コミ・評判の中で、評価が高い保育園の求人を紹介していただきたいです。
                    </h3>
                </div>
                <div class="qa_answer_block">
                    <p class="qa_answer_text">
                        <span class="qa_answer_icon">A.</span>
                        <span>姉妹サービスである<a href="https://hitoshia-hoiku.com/agent/signup" target="_blank" rel="noopener noreferrer" style="display: inline">ヒトシア保育</a>にて口コミの評価が高いご希望に沿った保育園をご紹介することが可能です。</span>
                    </p>
                </div>
            </li>
            <li class="qa_item">
                <div class="qa_quest_block QABtn">
                    <p class="qa_quest_icon">Q.</p>
                    <h3 class="qa_quest_title">
                        保育ひろばに会員登録をしたら何ができるようになりますか？
                    </h3>
                </div>
                <div class="qa_answer_block">
                    <p class="qa_answer_text">
                        <span class="qa_answer_icon">A.</span>
                        <span>気になる保育園や求人を保存し、後日に再度閲覧ができたり、通知を受け取ったりすることが可能になります。</span>
                    </p>
                </div>
            </li>
        </ul>
    </div>
</section>            
<section class="common_campaign_block school_d">
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
            <div class="campaign_post_btn PopBtn" style="cursor: pointer" data-pop="Login">口コミを投稿</div>
          </div>
        </div>
      </div>
    </div>
  </section>             
<section class="common_area_block ">
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
</div>

  <!-- search popup -->
    <div class="common_sp">
<<<<<<< HEAD
        <form method="get" action="/nurseries/{{$nurseryData['id']}}">
=======
        <form method="get" action="https://hoikuhiroba-kuchikomi.com/nurseries/9453/kuchikomi">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
        <!-- 条件を絞り込む -->
        <div class="school-sp_popup_block SchoolPop" id="SearchWindow" style="display:none;">
            <div class="school-sp_popup_head mb0">
                <h3 class="school-sp_popup_title">
                    条件を絞り込む
                </h3>
                <button type="button" class="school-sp_popup_close_btn PopCloseBtn">キャンセル</button>
            </div>
            <div class="school-sp_popup_inner btn_fixed">
                <div class="school-d_post_aside_box">
                    <p class="school-d_post_aside_title">雇用形態</p>
                    <ul class="school-d_post_aside_list">
                            <li class="school-d_post_aside_item">
                                <label class="school-d_post_check_label">
                                    <input
                                        type="checkbox"
                                        name="contract_types[]"
                                        value="1"
                                                                            >
                                    <p class="school-d_post_check_text">正社員(0件)</p>
                                </label>
                            </li>
                            <li class="school-d_post_aside_item">
                                <label class="school-d_post_check_label">
                                    <input
                                        type="checkbox"
                                        name="contract_types[]"
                                        value="2"
                                    >
                                    <p class="school-d_post_check_text">契約・派遣社員(8件)</p>
                                </label>
                            </li>
                            <li class="school-d_post_aside_item">
                                <label class="school-d_post_check_label">
                                    <input
                                        type="checkbox"
                                        name="contract_types[]"
                                        value="3"
                                                                            >
                                    <p class="school-d_post_check_text">パート・アルバイト(0件)</p>
                                </label>
                            </li>
                            <li class="school-d_post_aside_item">
                                <label class="school-d_post_check_label">
                                    <input
                                        type="checkbox"
                                        name="contract_types[]"
                                        value="4"
                            >
                                    <p class="school-d_post_check_text">その他(0件)</p>
                                </label>
                            </li>
                        </ul>
                </div>
                <div class="school-d_post_aside_box">
                    <p class="school-d_post_aside_title">性別</p>
                    <ul class="school-d_post_aside_list">
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="genders[]"
                                    value="1"
                                    disabled                                     
                                >
                                <p class="school-d_post_check_text">男性(0件)</p>
                            </label>
                        </li>
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="genders[]"
                                    value="2"
                                >
<<<<<<< HEAD
                                <p class="school-d_post_check_text">女性({{$nurseryData['review_count']}}件)</p>
=======
                                <p class="school-d_post_check_text">女性(8件)</p>
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="school-d_post_aside_box">
                    <p class="school-d_post_aside_title">
                        <span>アンジェリカ東品川保育園 の</span>
                        カテゴリー別口コミ・評判
                    </p>
                    <ul class="school-d_post_aside_list">
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="evaluation_ids[]"
                                    value="1"
                                >
                                <p class="school-d_post_check_text">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon07.svg')}}" alt="園庭・園舎" class="normal">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon07_active.svg')}}" alt="園庭・園舎" class="active">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon07.svg" alt="園庭・園舎" class="normal">
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon07_active.svg" alt="園庭・園舎" class="active">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    園庭・園舎 (1件)
                                </p>
                            </label>
                        </li>
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="evaluation_ids[]"
                                    value="2"
                                >
                                <p class="school-d_post_check_text">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon01.svg')}}" alt="職員同士の人間関係" class="normal">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon01_active.svg')}}" alt="職員同士の人間関係" class="active">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon01.svg" alt="職員同士の人間関係" class="normal">
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon01_active.svg" alt="職員同士の人間関係" class="active">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    職員同士の人間関係 (1件)
                                </p>
                            </label>
                        </li>
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="evaluation_ids[]"
                                    value="3"
                                >
                                <p class="school-d_post_check_text">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon02.svg')}}" alt="主任・園長との人間関係" class="normal">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon02_active.svg')}}" alt="主任・園長との人間関係" class="active">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon02.svg" alt="主任・園長との人間関係" class="normal">
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon02_active.svg" alt="主任・園長との人間関係" class="active">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    主任・園長との人間関係 (1件)
                                </p>
                            </label>
                        </li>
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="evaluation_ids[]"
                                    value="4"
                                >
                                <p class="school-d_post_check_text">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon03.svg')}}" alt="保護者との人間関係" class="normal">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon03_active.svg')}}" alt="保護者との人間関係" class="active">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon03.svg" alt="保護者との人間関係" class="normal">
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon03_active.svg" alt="保護者との人間関係" class="active">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    保護者との人間関係 (1件)
                                </p>
                            </label>
                        </li>
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="evaluation_ids[]"
                                    value="5"
                                >
                                <p class="school-d_post_check_text">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon04.svg')}}" alt="給与・福利厚生" class="normal">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon04_active.svg')}}" alt="給与・福利厚生" class="active">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon04.svg" alt="給与・福利厚生" class="normal">
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon04_active.svg" alt="給与・福利厚生" class="active">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    給与・福利厚生 (1件)
                                </p>
                            </label>
                        </li>
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="evaluation_ids[]"
                                    value="6"
                                >
                                <p class="school-d_post_check_text">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon08.svg')}}" alt="シフトの融通" class="normal">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon08_active.svg')}}" alt="シフトの融通" class="active">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon08.svg" alt="シフトの融通" class="normal">
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon08_active.svg" alt="シフトの融通" class="active">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    シフトの融通 (1件)
                                </p>
                            </label>
                        </li>
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="evaluation_ids[]"
                                    value="7"
                                >
                                <p class="school-d_post_check_text">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon06.svg')}}" alt="業務量" class="normal">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon06_active.svg')}}" alt="業務量" class="active">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon06.svg" alt="業務量" class="normal">
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon06_active.svg" alt="業務量" class="active">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    業務量 (1件)
                                </p>
                            </label>
                        </li>
                        <li class="school-d_post_aside_item">
                            <label class="school-d_post_check_label">
                                <input
                                    type="checkbox"
                                    name="evaluation_ids[]"
                                    value="8"
                                                                        >
                                <p class="school-d_post_check_text">
<<<<<<< HEAD
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon05.svg')}}" alt="保育方針" class="normal">
                                    <img src="{{asset('assets/user/images/school/detail/cat_icon05_active.svg')}}" alt="保育方針" class="active">
=======
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon05.svg" alt="保育方針" class="normal">
                                    <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/school/detail/cat_icon05_active.svg" alt="保育方針" class="active">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
                                    保育方針 (1件)
                                </p>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="school-sp_popup_fixed_btnarea">
                <button type="submit" class="school-sp_popup_fixed_submit">条件を確定する</button>
            </div>
        </div>
        </form>
    </div>
  <!-- login popup -->
  
  <!-- read popup -->
  <div class="popup_filter" id="ReadFilter"></div>
    <div class="popup_wrap" id="ReadWindow">
      <button type="button" class="popup_close_btn PopCloseBtn">
<<<<<<< HEAD
          <img src="{{asset('assets/user/images/popup/close_icon.svg')}}" alt="close">
=======
          <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/popup/close_icon.svg" alt="close">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
      </button>
      <div class="popup_inner">
          <p class="popup_title">
              こちらの機能をご利用頂くには<br>
              いずれかを選択してください
          </p>
          <a href="post.html" class="popup_post_btn">
              口コミの投稿<span>（最大10日間ご利用可能）</span>
          </a>
<<<<<<< HEAD
          <a href="/register" class="popup_service_btn">
=======
          <a href="https://hoikuhiroba-kuchikomi.com/register" class="popup_service_btn">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
              転職サービスに登録<span>（3日間ご利用可能）</span>
          </a>
      </div>
  </div>

  <!-- report popup -->
<div class="popup_filter" id="ReportFilter"></div>
<div class="popup_report_wrap" id="ReportWindow">
  <div class="common_pc pc">
      <button type="button" class="popup_close_btn PopClaimCloseBtn">
<<<<<<< HEAD
          <img src="{{asset('assets/user/images/popup/close_icon.svg')}}" alt="close">
=======
          <img src="https://hoikuhiroba-kuchikomi.com/assets/user/images/popup/close_icon.svg" alt="close">
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
      </button>
      <h3 class="popup_report_title">不適切として報告する</h3>
      <ul class="popup_report_list">
          <li class="popup_report_item">
              <p class="form_title">不適切と思われる具体的な理由<span>必須</span></p>
              <textarea name="comment" class="form_textarea h150"></textarea>
              
          </li>
          <li class="popup_report_item">
              <p class="form_title">対象の保育園との関係<span>必須</span></p>
              <ul class="popup_report_radio_list">
                  <li class="popup_report_radio_item">
                      <label class="form_check_label">
                          <input type="radio" name="relationship" value=1>
                          <span>現在勤務している</span>
                      </label>
                  </li>
                  <li class="popup_report_radio_item">
                      <label class="form_check_label">
                          <input type="radio" name="relationship" value=2>
                          <span>以前勤務していた</span>
                      </label>
                  </li>
                  <li class="popup_report_radio_item">
                      <label class="form_check_label">
                          <input type="radio" name="relationship" value=3>
                          <span>その他</span>
                      </label>
                  </li>
              </ul>
          </li>
      </ul>
      <button type="button" class="common_btn02 center w320" onClick="createClaim('pc')">報告する</button>
  </div>
  <div class="common_sp sp">
      <div class="school-sp_popup_head mb0">
          <h3 class="school-sp_popup_title">
              不適切として報告する
          </h3>
          <button type="button" class="school-sp_popup_close_btn PopClaimCloseBtn">キャンセル</button>
      </div>
      <div class="school-sp_popup_inner btn_fixed">
          <p class="popup_report_text">
              こちらの口コミの内容が不適切であると感じた場合は下記フォームからご報告お願いします。<br>
              ご報告いただいた内容については保育ひろば事務局で確認の上適宜対応を行っておりますので、反映にお時間いただく場合がございます。<br>
              またご返信は行っておりませんのでご認識のほどよろしくお願いします。<br>
              投稿者による口コミの削除依頼も受けつけておりません。
          </p>
          <ul class="popup_report_list">
              <li class="popup_report_item">
                  <p class="form_title">不適切と思われる具体的な理由<span>必須</span></p>
                  <textarea name="comment" class="form_textarea h150"></textarea>
                  
              </li>
              <li class="popup_report_item">
                  <p class="form_title">対象の保育園との関係<span>必須</span></p>
                  <ul class="popup_report_radio_list">
                      <li class="popup_report_radio_item">
                          <label class="form_check_label">
                              <input type="radio" name="relationship" value=1>
                              <span>現在勤務している</span>
                          </label>
                      </li>
                      <li class="popup_report_radio_item">
                          <label class="form_check_label">
                              <input type="radio" name="relationship" value=2>
                              <span>以前勤務していた</span>
                          </label>
                      </li>
                      <li class="popup_report_radio_item">
                          <label class="form_check_label">
                              <input type="radio" name="relationship" value=3>
                              <span>その他</span>
                          </label>
                      </li>
                  </ul>
                  
              </li>
          </ul>
      </div>
      <div class="school-sp_popup_fixed_btnarea">
          <button type="button" class="school-sp_popup_fixed_submit" onClick="createClaim('sp')">報告する</button>
      </div>
      <input type="hidden" name="evaluation_id" value="">
  </div>
</div>


<!-- login popup -->
<div class="popup_filter" id="ClainRegisteredFilter"></div>
<div class="popup_wrap" id="ClainRegisteredWindow">
  <button type="button" class="popup_close_btn PopCloseBtn">
      <img src="{{asset('assets/user/images/popup/close_icon.svg')}}" alt="close">
  </button>
  <div class="popup_inner">
      <p class="popup_title">
          <br>
          報告が完了しました。
      </p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

let evaluation_ids = {!! json_encode($evaluation_ids) !!};
for(var i=0;i<evaluation_ids.length;i++){
    $("input[name='evaluation_ids[]']").each(function() {
        if ($(this).val() == evaluation_ids[i]) {
            $(this).prop("checked", true); // check the checkbox
        }
    });
}    

let contract_types = {!! json_encode($contract_types) !!};
for(var i=0;i<contract_types.length;i++){
    $("input[name='contract_types[]']").each(function() {
        if ($(this).val() == contract_types[i]) {
            $(this).prop("checked", true); // check the checkbox
        }
    });
}    

let keyword = {!! json_encode($keyword) !!};
$('input[name="keyword"]').val(keyword);
function createClaim(media){
    // TODO ここは後でバックエンドからcompactで送る変数で取得
    const evaluationId = $('#ReportWindow input[name="evaluation_id"]').val();
    const className = "." + media;
    const comment = $(className).find('textarea[name="comment"]').val();
    if(comment.length == 0){
        alert("不適切と思われる理由をご記入ください。");
        return;
    }
    const relationship = $(className).find('input:radio[name="relationship"]:checked').val();
    if(relationship == null) {
        alert("対象の保育園との関係を選択してください。");
        return;
    }

    $.ajax({
        url: '/claim/create',
        type: "POST",
        data:{
            _token: "KX6FPREbHXbErRBDFlzO4vNFzmtlGcU5kKqRhOaT",
            evaluation_id: evaluationId,
            comment: comment,
            relationship: relationship
        }
    }).then(
        function(res){
            $("#ReportFilter").fadeOut();
            $("#ReportWindow").hide();
            $("#ReportWindow").find('textarea[name="comment"]').val('');
            $("#ReportWindow").find('input:radio[name="relationship"]:checked').prop('checked', false);
            if(!res.data.res){
                alert(res.data.message);
                return;
            }
            console.log("ここ");
            
            $("#ClainRegisteredFilter").fadeIn();
            $("#ClainRegisteredWindow").show();
        },
        function(res){
            alert("報告の作成ができませんでした。\nお手数ですが再度ご記入ください");
            $("#ReportWindow").find('textarea[name="comment"]').val('');
            $("#ReportWindow").find('input:radio[name="relationship"]:checked').prop('checked', false);
        }
    );
}
$(document).on('click', '.PopClaimCloseBtn', function(){
    $(this).parents().prev(".popup_filter").fadeOut();
    $(this).parents(".popup_wrap,.SchoolPop,.popup_report_wrap").hide();
    $("#ReportWindow").find('textarea[name="comment"]').val('');
    $("#ReportWindow").find('input:radio[name="relationship"]:checked').prop('checked', false);
});
$(function(){
    var $setElm = $('.PostText span');
    var cutFigure = '33'; // カットする文字数
    var afterTxt = ' …'; // 文字カット後に表示するテキスト
    var textLength;
    var textTrim;

    $setElm.each(function(){
        textLength = $(this).text().length;
        textTrim = $(this).text().substr(0,(cutFigure))

        if(cutFigure < textLength) {
            $(this).html(textTrim + afterTxt).css({visibility:'visible'});
        } else if(cutFigure >= textLength) {
            $(this).css({visibility:'visible'});
        }
    });

    $(document).on('click', '.ReadMoreBtn', function(){
        var TargetText = $(this).prev().data("text");
        $(this).hide().prev().text(TargetText);
    });
});
$('.school-d_post_like_btn.LikeBtn').on('click', function () {
    const clickedBtn = $(this);
    const evaluationId = $(this).data('evaluation_id');
    const displayedCount = Number($(this).find('small').text());
    const hasActiveClass = $(this).hasClass('active');
    const nextDisplayedCount = (!hasActiveClass) ? displayedCount + 1 : displayedCount - 1;
    clickedBtn.find('small').html(nextDisplayedCount);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: "/toggle_liked_evaluation",
        data:{
            review_id: evaluationId,
        },
    }).done(function(datas){
    }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        // alert(errorThrown);
    })
});

$('.school-d_mv_graph_btn').on('click', function(){
    $('.compare_with_prefecture_ave').addClass("active");
    $('.not_compare_with_prefecture_ave').removeClass("active");
});

// const labels =['職員同士の人間関係','管理職との人間関係','保護者との人間関係','シフトの融通','園庭・園舎','業務量','保育方針','給料福利厚生'];
const labels = ["", "", "", "", "", "", "", ""];
const totalScore = 4.7;

let cateScores = [];

let reviewTypeData = {!! json_encode($reviewTypeData) !!};
<<<<<<< HEAD
console.log(reviewTypeData)
if(reviewTypeData.length!=8){
    cateScores = [
        3,
        3,
        3.5,
        4,
        3,
        3,
        4,
        4,
=======
if(reviewTypeData.length!=8){
    cateScores = [
        2.5,
        5,
        5,
        5,
        5,
        5,
        5,
        5,
>>>>>>> d60301df9a95fe6864abc3f2155f80c944c15abc
    ];
}else{
    cateScores = [
        reviewTypeData[1]['review_rating'],
        reviewTypeData[2]['review_rating'],
        reviewTypeData[3]['review_rating'],
        reviewTypeData[5]['review_rating'],
        reviewTypeData[0]['review_rating'],
        reviewTypeData[6]['review_rating'],
        reviewTypeData[7]['review_rating'],
        reviewTypeData[4]['review_rating']
    ];
}

const prefectureTotalScore = 3.3;
let prefecturecateScores = [];
if(prefectureTotalScore != null){
    prefecturecateScores = [
        3.2,
        2.8,
        3.7,
        3.4,
        3.4,
        3.1,
        3.1,
        3.2,
    ];
}else{
    prefecturecateScores = [3.0, 3.0, 3.0, 3.0, 3.0, 3.0, 3.0, 3.0];
}

const datanormal = {
    labels: labels,
    datasets: [
    {
        data: cateScores,
        fill: true,
        backgroundColor: "rgba( 254, 195, 45, 0.8)",
        borderColor: "rgba(254, 195, 45 , 0.8)",
        pointBackgroundColor: "rgba(254, 195, 45 , 0)",
        pointBorderColor: "rgba(254, 195, 45 , 0)",
        pointHoverBackgroundColor: "rgba(254, 195, 45 , 0)",
        pointHoverBorderColor: "rgba(254, 195, 45 , 0)",
    },
    ],
};
// TODO ここは県平均を出すためデータの整形が必要。
const datacompare = {
    labels: labels,
    datasets: [
    {
        data: cateScores,
        fill: true,
        backgroundColor: "rgba( 255, 223, 2, 0.7)",
        borderColor: "rgba( 255, 223, 2, 0.7)",
        pointBackgroundColor: "rgba(255, 223, 2, 0)",
        pointBorderColor: "rgba(255, 223, 2, 0)",
        pointHoverBackgroundColor: "rgba(255, 223, 2, 0)",
        pointHoverBorderColor: "rgba(255, 223, 2, 0)",
    },
    {
        label: "東京都平均",
        data: prefecturecateScores,
        fill: true,
        backgroundColor: "rgba(151, 151, 151, 0)",
        borderColor: "rgb(151, 151, 151)",
        pointBackgroundColor: "rgba(151, 151, 151, 0)",
        pointBorderColor: "rgba(151, 151, 151, 0)",
        pointHoverBackgroundColor: "rgba(151, 151, 151, 0)",
        pointHoverBorderColor: "rgba(151, 151, 151, 0)",
    },
    ],
};
const config_normal = {
    type: "radar",
    data: datanormal,
    options: {
    elements: {
        line: {
        borderWidth: 1,
        },
    },
    plugins: {
        legend: {
        display: false,
        },
    },
    scales:{
        r: {
            angleLines: {
            display: false
            },
            suggestedMin: 0,
            suggestedMax: 5,
            ticks:{
                stepSize: 1,
                display: false
            },
            grid: {
                color: "#ffedbc"
            }
        }
    }
    },
};
const config_compare = {
    type: "radar",
    data: datacompare,
    options: {
    elements: {
        line: {
        borderWidth: 1,
        },
    },
    plugins: {
        legend: {
        display: false,
        },
    },
    scales:{
        r: {
            angleLines: {
            display: false
            },
            suggestedMin: 0,
            suggestedMax: 5,
            stepWidth: 1,
            ticks:{
                stepSize: 1,
                display: false
            },
            grid: {
                color: "#ffedbc"
            }
        }
    }
    },
};
const myChart01 = new Chart(
    document.getElementById("myChart01"),
    config_normal
);
const myChart02 = new Chart(
    document.getElementById("myChart02"),
    config_compare
);
const myChart03 = new Chart(
    document.getElementById("myChart03"),
    config_normal
);
const myChart04 = new Chart(
    document.getElementById("myChart04"),
    config_compare
);
</script>        
<!-- Event popup -->
<div class="popup_filter" id="EventPopFilter"></div>
<div class="popup_wrap" id="EventPopWindow" style="background-color: transparent; padding: 10px 10px; max-width: 550px;">
  <button type="button" class="popup_close_btn PopCloseBtn">
    <img src="{{asset('assets/user/images/popup/close_icon.svg')}}" alt="close">
  </button>
  <div class="align_center">
    <a href="/answer?utm_source=popup&utm_medium=banner&utm_campaign=202303" target="_blank" rel="noopener noreferrer">
      <img src="{{asset('assets/user/images/popup/event_popup_march.png')}}" alt="event" style="width: 100%; position: relative; left: 50%; transform: translateX(-50%);">
    </a>
  </div>
</div>
</main>

@endsection