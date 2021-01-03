@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="search-content">
                Kết quả tìm kiếm cho <span style="color: red">{{ $search_content }}</span> 
            </div>
            <table class="table table-bordered table-striped datatable" id="table_export">
                <tr>
                    <th>Mssv</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Giới tính</th>
                    <th>Email</th>
                    <th>Quê quán</th>
                </tr>
                @foreach($sv_info as $l)
                    <tr>
                        <td>{{$l->mssv}}</td>
                        <td>{{$l->name}}</td>
                        <td>0{{$l->sdt}}</td>
                        @foreach($gts as $gt)
                            @if ($l->gt_id === $gt->id)
                            <td>{{$gt->name}}</td>
                            @endif
                        @endforeach
                        <td>{{$l->email}}</td>
                        <td>{{$l->qq}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    
@endsection