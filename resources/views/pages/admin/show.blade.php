@extends('layouts.app')

@section('content')
<div class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Thông tin người dùng') }}</div>
    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>{{ __('Tên') }}</th>
                                    <th>{{ __('MSSV') }}</th>
                                    <th>{{ __('Khóa') }}</th>
                                    <th>{{ __('Khoa') }}</th>
                                    <th>{{ __('Số điện thoại') }}</th>
                                    <th>{{ __('Lớp') }}</th>
                                    <th>{{ __('Quê quán') }}</th>

                                </thead>
                                <tbody>
                                    @foreach($profiles as $profile)
                                        <tr>
                                            <td>{{ $profile->id }}</td>
                                            <td>{{ $profile->name }}</td>
                                            <td>{{ $profile->phone }}</td>
                                            <td>{{ $profile->mssv }}</td>
                                            <td>{{ $profile->class }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection