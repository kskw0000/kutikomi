@extends('admin.layouts.app')

@section('title', '保育園一覧')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">保育園一覧</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.nursery.create') }}" class="btn btn-sm btn-primary">
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
                <h6 class="m-0 font-weight-bold text-primary">保育園一覧
                </h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">お名前</th>
                                <th width="30%">住所</th>
                                <th width="20%">会社</th>
                                <th width="10%">アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nurseries as $nursery)
                                <tr>
                                    <td>{{ $nursery->name }}</td>
                                    <td>{{ $nursery->city->prefecture->name }} {{ $nursery->city->name }} {{ $nursery->address }}</td>
                                    <td>{{ $nursery->company->name }}</td>
                                    <td style="display: flex">
                                        <a href="{{ route('admin.nursery.edit', ['nursery' => $nursery->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $nurseries->links() }}
                </div>
            </div>
        </div>

    </div>

    @include('admin.nursery.delete-modal')

@endsection

@section('scripts')
    
@endsection
