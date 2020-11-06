@extends('layouts.app')

@section('content')
<div class="container">
    @if ($ttsv === null)
        <script>window.location = "/user/profile/create";</script>
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>           
                                <tr>
                                    <td><img src="{{ URL::to('/') }}/uploads/{{ $ttsv->image }}" class="img-thumbnail" width="75" /></td>
                                    <td>{{$ttsv->name}}</td>
                                    <td>{{$ttsv->mssv}}</td>
                                    <td>{{$ttsv->sdt}}</td>
                                    <td>{{$ttsv->qq}}</td>
                                    <td>{{$vien}}</td>
                                    <td>{{$khoa}}</td>
                                    <td>{{$gt}}</td>
                                    <td>
                                        <a href="{{ route('user.profile.edit', $ttsv->id)}}" type="button" class="btn btn-primary">Edit</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    
</div>
@endsection
