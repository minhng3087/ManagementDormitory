@extends('welcome')
@section('title','ChangePassword')
@section('content')
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger" role="alert">
      <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
      {{ session('error')}}
    </div>
  @endif
  @if (session()->get('message'))
    <div class="alert alert-success" role="alert">
      <a href="#" class="close" data-dismiss="alert" arial-label="close">&times;</a>
      <strong>Thành công:</strong>&nbsp;{{ session()->get('message')}}
    </div>
  @endif
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h4>Thay đổi mật khẩu</h4></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <form action="{{route('changepassword')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="current_password"><strong>Mật khẩu hiện tại:</strong></label>
                      <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>
                    <!-- End Current Password Input -->
                    <div class="form-group">
                      <label for="new_password"><strong>Mật khẩu mới:</strong></label>
                      <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <!-- End New Password Input -->
                    <div class="form-group">
                      <label for="new_password_confirmation"><strong>Nhập lại mật khẩu:</strong></label>
                      <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                    </div>
                    <!-- End New Confirm Password Input -->
                    <button class="btn btn-success" type="submit">Xác nhận</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
