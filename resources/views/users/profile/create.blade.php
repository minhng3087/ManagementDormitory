@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container">
        @if(Session::has('flag'))
            <div class="error" style="color: red;"><p>{{Session::get('message')}}</p></div>
        @endif
        <div class="card">
            <div class="card-body">

                <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                    <!-- Grid row -->
                    @csrf
                    <div class="form-row">
                    <!-- Grid column -->
                        <div class="col-md-6">
                            <!-- Material input -->
                            <div class="md-form form-group">
                            <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt">
                            @error('sdt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="sdt">Số điện thoại</label>
                            </div>
                        </div>
                        <!-- Grid column -->
                    
                        <!-- Grid column -->
                        <div class="col-md-6">
                            <!-- Material input -->
                            <div class="md-form form-group">
                            <input type="text" class="form-control @error('mssv') is-invalid @enderror" id="mssv" name="mssv">
                            @error('mssv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="mssv">Mã số sinh viên</label>
                            </div>
                        </div>
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                
                    <!-- Grid row -->
                    <div class="row">
                    <!-- Grid column -->
                        <div class="col-md-12">
                            <!-- Material input -->
                            <div class="md-form form-group">
                            <input type="text" class="form-control @error('qq') is-invalid @enderror"  id="qq" name="qq">
                            @error('qq')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="qq">Quê quán</label>
                            </div>
                        </div>
                    <!-- Grid column -->
                
                    <!-- Grid column -->

                        <div class="col-md-12">
                            <!-- Material input -->
                            <div class="md-form form-group">
                                <select class="custom-select custom-select-md @error('vien_id') is-invalid @enderror" name="vien_id">
                                    <option value="" selected>{{ __('Viện') }}</option>
                                    @foreach($viens as $vien)
                                    <option value="{{$vien->id}}">{{ $vien->name }}</option>
                                    @endforeach
                                </select>
                                @error('vien_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        
                    <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                
                    <!-- Grid row -->
                    <div class="form-row">
                    <!-- Grid column -->
                        <div class="col-md-5">
                            <!-- Material input -->
                            <div class="md-form form-group">
                                <select class="custom-select custom-select-md @error('gt_id') is-invalid @enderror" name="gt_id">
                                    <option value="" selected>{{ __('Giới tính') }}</option>
                                    @foreach($gts as $gt)
                                    <option value="{{ $gt->id}}">{{ $gt->name }}</option>
                                    @endforeach
                                </select>
                                @error('gt_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Grid column -->
                    
                        <!-- Grid column -->
                        <div class="col-md-5">
                            <!-- Material input -->
                            <div class="md-form form-group">
                                <select class="custom-select custom-select-md @error('khoa_id') is-invalid @enderror" name="khoa_id">
                                    <option value="" selected>Khóa</option>
                                    @foreach($khoas as $khoa)
                                    <option value="{{ $khoa->id}}">{{ $khoa->name }}</option>
                                    @endforeach
                                </select>
                                @error('khoa_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Grid column -->
                        <div class="col-md-12">
                            <div class="md-form form-group">
                                <div class="file-field">
                                    <div class="btn btn-primary btn-sm float-left">
                                        <label for="image">Select files</label>
                                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" multiple>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                    <!-- Grid row -->
                    <button type="submit" class="btn btn-primary btn-md">Thêm</button>
                </form>
              <!-- Extended material form grid -->
            </div>
          <!-- Extended material form grid -->
        </div>
</div>
@endsection