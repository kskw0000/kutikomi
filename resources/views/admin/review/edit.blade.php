@extends('admin.layouts.app')

@section('title', 'レビューコンテンツ')

<link rel="stylesheet" href="{{asset('admin/assets/user/css/reset.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/user/css/style.css')}}" />    

@php
    $evaluation_name = array('園庭・園舎', '職員同士の人間関係', '主任・園長との人間関係', '保護者との人間関係', '給与・福利厚生', 'シフトの融通', '業務量', '保育方針');
    $contract_name = array('正社員', '契約・派遣社員', 'パート・アルバイト', 'その他');
    $work_period = array('2001-2005', '2006-2010', '2011-2015', '2016-2020', '2021~', 'other');
@endphp

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">レビューコンテンツ</h1>
        <a href="{{route('admin.review.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> 戻る</a>
    </div>

    {{-- Alert Messages --}}
    {{-- @include('admin.common.alert') --}}
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">レビューコンテンツ</h6>
        </div>
        <div class="card-body">
            <div class="col-12">
              <ul class="school-d_post_list">
                @foreach ($reviews as $item)
                <li class="school-d_post_item">
                    <div class="school-d_post_head">
                        <div class="school-d_post_head_main">
                            <p class="school-d_post_head_subtitle">
                                {{$item->nursery_name}}の口コミ・評判
                            </p>
                            <div class="school-d_post_head_title_block">
                                <h3 class="school-d_post_head_title">{{$evaluation_name[$item->review_type-1]}}</h3>
                                @if ($item->rating>2.5)
                                <p class="school-d_post_head_text  good-color ">
                                    <img src="{{ asset("admin/assets/user/images/school/detail/face_icon01.svg") }}" alt="良い点">良い点
                                </p>
                                @else
                                <p class="school-d_post_head_text  bad-color ">
                                    <img src="{{ asset("admin/assets/user/images/school/detail/face_icon02.svg") }}" alt="良い点">改善点
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
                                                <img src='{{asset('admin/assets/user/images/star/star10.svg')}}' alt='star10'>
                                            </li>
                                            @php $cur_rating-=1 @endphp
                                        @elseif ($cur_rating>0)
                                            <li class=school_star_item>
                                                <img src='{{ asset("admin/assets/user/images/star/star0" . $cur_rating * 10 . ".svg") }}' alt='star{{ $cur_rating * 10 }}'>
                                            </li>
                                            @php $cur_rating-=1 @endphp
                                        @else
                                            <li class=school_star_item>
                                                <img src='{{asset('admin/assets/user/images/star/star00.svg')}}' alt='star00'>
                                            </li>
                                        @endif
                                    @endfor
                                </ul>
                                <p class="school-d_post_head_rate_num">{{number_format($item->rating,1)}}</p>
                            </div>
                        </div>
                    </div>
                    <p class="school-d_post_info">
                        <span>{{$item->user_name}}(女性・{{$contract_name[$item->employment-1]}})</span><span>勤務時期:{{$work_period[$item->workperiod-1]}}</span>
                    </p>
                    <div class="school-d_post_box">
                        <div class="common_pc_640">
                            <p class="school-d_post_text PostText">
                                <span data-text="{{$item->content}}">{{$item->content}}</span>
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
                </li>                                        
                @endforeach
            </ul>
            </div>
        </div>
    </div>
</div>

@endsection