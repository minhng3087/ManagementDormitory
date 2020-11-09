@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
                    <!-- Grid row -->
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" value="{{ $user->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="qq">{{ __('Tên người dùng') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" value="{{ $user->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="qq">{{ __('Email') }}</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">{{ __('Sửa')}}</button>
                </form>  
            </div>
          <!-- Extended material form grid -->
        </div>
</div>
@endsection
