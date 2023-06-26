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
                      会員登録確認
                  </li>
              </ul>
          </div>
          <form method="post" action="/post-registrater">
              @csrf
              <div class="register_bg_wrap register_confirm">
                  <h1 class="register_title">会員登録内容の確認</h1>
                  <ul class="form_confirm_list">
                      <li class="form_confirm_item">
                          <h2 class="form_confirm_title">ニックネーム</h2>
                          <p class="form_confirm_text">
                              {{$data['name']}}
                          </p>
                      </li>
                      <li class="form_confirm_item">
                          <h2 class="form_confirm_title">生年月日</h2>
                          <p class="form_confirm_text">
                              {{$data['birthday_year']}}年
                              {{$data['birthday_month']}}月
                              {{$data['birthday_day']}}日
                          </p>
                      </li>
                      <li class="form_confirm_item">
                          <h2 class="form_confirm_title">口コミを見たいエリア</h2>
                          <p class="form_confirm_text">
                            @foreach ($prefectureData as $item)
                                @if ($item->id == $data['prefecture_id'])
                                    {{$item->name}}
                                @endif
                            @endforeach
                            @foreach ($cityData as $item)
                                @if ($item->id == $data['city_id'])
                                    {{$item->name}}
                                @endif
                            @endforeach
                              {{-- 福島県二本松市 --}}
                          </p>
                      </li>
                      <li class="form_confirm_item">
                          <h2 class="form_confirm_title">性別</h2>
                          <p class="form_confirm_text">
                              @if ($data['gender'] == 1)
                                男性
                              @else
                                女性
                              @endif
                          </p>
                      </li>
                      <li class="form_confirm_item">
                          <h2 class="form_confirm_title">保有資格</h2>
                          <p class="form_confirm_text">
                            @for ($i = 0; $i<count($data['qualifications']);$i++)
                                @if ($i != count($data['qualifications'])-1)
                                    {{$qualificationData[$data['qualifications'][$i]]->name}}, 
                                @endif
                                {{$qualificationData[$data['qualifications'][$i]]->name}}
                            @endfor                            
                            {{-- 幼稚園教諭Ⅱ種、栄養士 --}}
                          </p>
                      </li>
                      <li class="form_confirm_item">
                          <h2 class="form_confirm_title">メールアドレス</h2>
                          <p class="form_confirm_text">
                              {{$data['email']}}
                          </p>
                      </li>
                      <li class="form_confirm_item">
                          <h2 class="form_confirm_title">パスワード</h2>
                          <p class="form_confirm_text">
                              @for ($i = 0; $i < strlen($data['password']); $i++)
                                ●
                              @endfor
                          </p>
                      </li>
                  </ul>
                  <div class="form_btnarea">
                      <button type="submit" class="common_btn01">上記内容で登録する</button>
                      <a href="/register" class="common_btn04">登録内容を修正</a>
                  </div>
                  <input type="hidden" name="name" value="{{$data['name']}}">
                  <input type="hidden" name="birthday_year" value="{{$data['birthday_year']}}">
                  <input type="hidden" name="birthday_month" value="{{$data['birthday_month']}}">
                  <input type="hidden" name="birthday_day" value="{{$data['birthday_day']}}">
                  <input type="hidden" name="zip_code" value="1600231">
                  <input type="hidden" name="prefecture_id" value="{{$data['prefecture_id']}}">
                  <input type="hidden" name="city_id" value="{{$data['city_id']}}">
                  <input type="hidden" name="gender" value="{{$data['gender']}}">
                  @foreach ($data['qualifications'] as $item)
                    <input type="hidden" name="qualifications[]" value="{{$item}}">
                  @endforeach
                  <input type="hidden" name="email" value="{{$data['email']}}">
                  <input type="hidden" name="password" value="{{$data['password']}}">
                  <input type="hidden" name="confirmed" value="1">
              </div>
          </form>
      </div>
  </div>
</main>

@endsection