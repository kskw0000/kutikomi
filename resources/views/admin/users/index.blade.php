@extends('admin.layouts.app')

@section('title', 'ユーザー一覧')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ユーザー一覧</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> 新規追加
                    </a>
                </div>
                
            </div>

        </div>

        {{-- Alert Messages --}}
        {{-- @include('admin.common.alert') --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ユーザー一覧</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">お名前</th>
                                <th width="25%">メール</th>
                                <th width="15%">ロール</th>
                                <th width="15%">スターテス</th>
                                <th width="10%">アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles ? $user->roles->pluck('name')->first() : 'N/A' }}</td>
                                    <td>
                                        @if ($user->status == 0)
                                            <span class="badge badge-danger">非活性</span>
                                        @elseif ($user->status == 1)
                                            <span class="badge badge-success">アクティブ</span>
                                        @endif
                                    </td>
                                    <td style="display: flex">
                                        @if ($user->status == 0)
                                            <a href="{{ route('admin.users.status', ['user_id' => $user->id, 'status' => 1]) }}"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif ($user->status == 1)
                                            <a href="{{ route('admin.users.status', ['user_id' => $user->id, 'status' => 0]) }}"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger m-2" href="#" data-user-id="{{ $user->id }}" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    @include('admin.users.delete-modal', ['userData' => $user])
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    
@endsection
