@extends('layouts.app')

@section('title', '権限編集')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">権限編集</h1>
        <a href="{{route('permissions.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> 戻る</a>
    </div>

    {{-- Alert Messages --}}
    {{-- @include('common.alert') --}}
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">権限編集</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('permissions.update', ['permission' => $permission->id])}}">
                @csrf
                @method('PUT')
                <div class="form-group row">

                    {{-- Name --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>お名前</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('name') is-invalid @enderror" 
                            id="exampleName"
                            placeholder="Name" 
                            name="name" 
                            value="{{ old('name') ? old('name') : $permission->name }}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    {{-- Guard Name --}}
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span style="color:red;">*</span>ガード名</label>
                        <select class="form-control form-control-user @error('guard_name') is-invalid @enderror" name="guard_name">
                            <option selected disabled>ガード名を選択する</option>
                            <option value="web" {{old('guard_name') ? ((old('guard_name') == 'web') ? 'selected' : '') : (($permission->guard_name == 'web') ? 'selected' : '')}}>Web</option>
                            <option value="api" {{old('guard_name') ? ((old('guard_name') == 'api') ? 'selected' : '') : (($permission->guard_name == 'api') ? 'selected' : '')}}>Api</option>
                        </select>
                        @error('guard_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>

                {{-- Save Button --}}
                <button type="submit" class="btn btn-success btn-user btn-block">
                保存
                </button>

            </form>
        </div>
    </div>

</div>


@endsection