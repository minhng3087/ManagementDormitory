@extends('layouts.app')
@section('content')
    @if(Auth::user()->hasRole('admin'))
	<div class="container">
        <h3 style="">
            <i class="fa fa-arrow-circle-o-right"></i>
                Danh sách sinh viên
        </h3>
        @if(count($list)==0)
            <h4>Phòng chưa có sinh viên đăng ký</h4>
        @else
        <table class="table table-bordered table-striped datatable" id="table_export">
            <tr>
                <th>Mssv</th>
                <th>Họ tên</th>
                <th>Trạng thái đăng ký</th>
                <th>Xem thông tin</th>
                <th>Xóa sinh viên</th>
            </tr>
            @foreach($list as $l)
            <tr>
                <td>{{$l->mssv}}</td>
                <td>{{$l->name}}</td>
                <td>
                        <span @if($l->status=="registered")
                                    class="label label-warning"
                                @elseif($l->status=="success")
                                    class="label label-success"
                                @elseif($l->status=="cancelled")
                                    class="label label-danger"
                                @else class="label label-success"
                                @endif
                                style="font-size: 15px;">{{$l->status}}</span>
                </td>
                <td><a href="{{ route('get_manager_ttsv', $l->mssv) }}"><button type="button" class="btn btn-primary">Xem</button></a></td>
                <td><a href="{{ route('manager_delete_sv', $l->mssv) }}"><button type="button" class="btn btn-primary">Xóa</button></a></td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
    @endif
@endsection
