@extends('layouts.app')
@section('content')
    @if(Auth::user()->hasRole('admin'))
    <div class="container">
        <div class="list_phong">
            <h3 style="">
                <i class="fa fa-arrow-circle-o-right"></i>
                    Danh sách phòng
            </h3>
            <table class="table table-bordered table-striped datatable" id="table_export">
                <tr>
                    <th>Số phòng</th>
                    <th>Số người hiện tại</th>
                    <th>Số người tối đa</th>
                    <th>Giới tính</th>
                    <th>Xem</th>
                </tr>
                @foreach($ttphong as $p)
                <tr>
                    <td>{{$p->room_number}}</td>
                    <td>{{$p->current_numbers}}</td>
                    <td>{{$p->max_numbers}}</td>
                    <td>@if($p->gender=="nam")
                            {{"Nam"}}
                        @else {{"Nữ"}}
                        @endif
                    </td>
                    <td><a href="{{route('manager_ttphong',$p->id)}}"><button type="button" class="btn btn-primary">Xem thông tin</button></a></td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="row">
            <div class="col-xs-6 col-left"></div>
            <div class="col-xs-6 col-right">
                <div class="dataTables_paginate paging_bootstrap">
                    {!! $ttphong->links() !!}
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
