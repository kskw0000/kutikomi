@extends('admin.layouts.app')

@section('title', 'プロフィール')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
            <h1 class="h3 mb-0 text-gray-800">プロフィール</h1>
        </div>

        {{-- Alert Messages --}}
        {{-- @include('admin.common.alert') --}}

        {{-- Page Content --}}
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="{{ asset('admin/admin/img/undraw_profile.svg') }}">
                    <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    <span class="text-black-50"><i>ロール:
                            {{ auth()->user()->roles
                                ? auth()->user()->roles->pluck('name')->first()
                                : 'N/A' }}</i></span>
                    <span class="text-black-50">{{ auth()->user()->email }}</span>
                </div>
            </div>
            <div class="col-md-9 border-right">
                {{-- Profile --}}
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">プロフィール</h4>
                    </div>
                    <form action="{{ route('admin.profile.update') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">お名前</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" placeholder="Name"
                                    value="{{ old('name') ? old('name') : auth()->user()->name }}">

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">プロフィールを更新する</button>
                        </div>
                    </form>
                </div>

                <hr>
                {{-- Change Password --}}
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">パスワードを変更する
                        </h4>
                    </div>

                    <form action="{{ route('admin.profile.change-password') }}" method="POST">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label class="labels">現在パスワード</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="" required>
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">新しいパスワード</label>
                                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required placeholder="">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="labels">確認パスワード</label>
                                <input type="password" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" required placeholder="">
                                @error('new_confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-success profile-button" type="submit">パスワードを変更する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
