@extends('admin.layouts.app')

@section('title', '会社一覧')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">会社一覧
            </h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.company.create') }}" class="btn btn-sm btn-primary">
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
                <h6 class="m-0 font-weight-bold text-primary">会社一覧</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="25%">お名前</th>
                                <th width="20%">住所</th>
                                <th width="10%">郵便番号</th>
                                <th width="10%">アクション</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->city->prefecture->name }} {{ $company->city->name }} {{ $company->address }}</td>
                                    <td>{{ $company->postcode }}</td>
                                    <td style="display: flex">
                                        <a href="{{ route('admin.company.edit', ['company' => $company->id]) }}"
                                            class="btn btn-primary m-2">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <a class="btn btn-danger m-2" href="#" data-toggle="modal" data-target="#deleteModal{{$company->id}}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                    @include('admin.company.delete-modal', ['companyData' => $company])
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $companies->links() }}
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    
@endsection
