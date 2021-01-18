@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Gửi thông báo') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif

                        <form action="{{ route('send.notification') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" name="body"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Link đính kèm</label>
                                <textarea class="form-control" name="link"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi thông báo</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
