@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <h3 style="">
                <i class="fa fa-arrow-circle-o-right"></i>
                Thông tin cán bộ quản lý
            </h3>
                <div class="lsdk">
                    <table class="table table-bordered table-striped datatable" id="table_export">
                        <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ URL::to('/') }}/uploads/mng.png" alt="" style="width: 70px;">
                                </td>
                                <td>Nguyễn Thị Linh</td>
                                <td>linhnt@gmail.com</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ URL::to('/') }}/uploads/mng.png" alt="" style="width: 70px;">
                                </td>
                                <td>Phạm Như Quỳnh</td>
                                <td>quynhpn@gmail.com</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="{{ URL::to('/') }}/uploads/mng.png" alt="" style="width: 70px;">
                                </td>
                                <td>Trần Thanh Toàn</td>
                                <td>toantt@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    
@endsection