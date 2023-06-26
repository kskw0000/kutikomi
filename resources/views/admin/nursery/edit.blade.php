@extends('admin.layouts.app')

@section('title', '会社編集')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">編集</h1>
        <a href="{{route('admin.nursery.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> 戻る
</a>
    </div>

    {{-- Alert Messages --}}
    {{-- @include('admin.common.alert') --}}
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">編集
</h6>
        </div>
        <form method="POST" action="{{route('admin.nursery.update', ['nursery' => $nursery->id])}}">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group row">

                    {{-- Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>お名前</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('name') is-invalid @enderror" 
                            id="exampleName"
                            placeholder="Name" 
                            name="name" 
                            value="{{ old('name') ? old('name') : $nursery->name }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Address --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>住所

                        </label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('address') is-invalid @enderror" 
                            id="exampleAddress"
                            placeholder="Address" 
                            name="address" 
                            value="{{ old('address') ? old('address') : $nursery->address }}">

                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Prefecture --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>県</label>
                        <select class="form-control form-control-user @error('prefecture_id') is-invalid @enderror" name="prefecture_id">
                            <option selected disabled></option>
                            @foreach ($prefectures as $prefecture)
                              <option value="{{$prefecture->id}}" 
                                {{old('prefecture_id') ? ((old('prefecture_id') == $prefecture->id) ? 'selected' : '') : (($nursery->city->prefecture_id == $prefecture->id) ? 'selected' : '')}}>
                                {{$prefecture->name}}
                              </option>
                            @endforeach
                        </select>
                        @error('prefecture_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- City --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>市</label>
                        <select class="form-control form-control-user @error('city') is-invalid @enderror" name="city_id">
                            <option selected disabled></option>
                            @foreach ($cities as $city)
                              <option value="{{$city->id}}" 
                                {{old('city_id') ? ((old('city_id') == $city->id) ? 'selected' : '') : (($nursery->city_id == $city->id) ? 'selected' : '')}}>
                                {{$city->name}}
                              </option>
                            @endforeach
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Facility --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>施設</label>
                        <select class="form-select form-control form-control-user @error('facility') is-invalid @enderror" name="facility[]" multiple="multiple">
                            <option disabled></option>
                            @foreach ($facilities as $facilityItem)
                                <option value="{{$facilityItem->id}}" {{($nursery->facility->contains($facilityItem) ? 'selected' : "")}}>{{$facilityItem->name}}</option>
                            @endforeach
                        </select>
                        @error('prefecture_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    

                    {{-- Company --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>会社</label>
                        <select class="form-control form-control-user @error('cooperate') is-invalid @enderror" name="cooperate_id">
                            <option selected disabled></option>
                            @foreach ($companies as $company)
                              <option value="{{$company->id}}" 
                                {{old('cooperate_id') ? ((old('cooperate_id') == $company->id) ? 'selected' : '') : (($nursery->cooperate_id == $company->id) ? 'selected' : '')}}>
                                {{$company->name}}
                              </option>
                            @endforeach
                        </select>

                        @error('company')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">保存</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('admin.company.index') }}">キャンセル</a>
            </div>
        </form>
    </div>

</div>
@endsection

@section('scripts')
    

<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    // Listen for changes to prefecture select
    $('select[name="prefecture_id"]').change(function() {
        var prefecture = $('select[name="prefecture_id"]').val();
        
        // Make an AJAX request to get the corresponding city data
        $.ajax({
            url: '/cities',
            method: 'POST',
            data: {
                prefecture: prefecture,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Clear and update city select options
                $('select[name="city_id"]').empty();
                $('select[name="city_id"]').append("<option value=''>Select City</option>");
                $.each(response, function(index, city) {
                    $('select[name="city_id"]').append("<option value='" + city.id + "'>" + city.name + "</option>");
                });
            }
            });
    });
});
</script>
@endsection