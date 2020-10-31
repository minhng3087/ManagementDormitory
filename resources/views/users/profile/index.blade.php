@extends('layouts.app')

@section('content')
<div class="container">
    @if ($ttsv === null)
        @include ('users.profile.create');
    @else
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>           
                                <tr>
                                    <td>{{$ttsv->name}}</td>
                                    <td>{{$ttsv->mssv}}</td>
                                    <td>{{$ttsv->phone}}</td>
                                    <td>{{$ttsv->class}}</td>
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
