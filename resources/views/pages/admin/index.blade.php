@extends('layouts.app')

@section('content')
<div class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tài khoản người dùng') }}</div>
    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Tên tài khoản</th>
                                    <th>Tên người dùng</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            @if ( $user->roles()->get()->pluck('name')->toArray() !== ["admin"])
                                            <td>{{ $user->id - 1}}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->name }}</td>
                                            @foreach($profiles as $profile)
                                                @if($profile->email === $user->email)
                                                <td><a href="{{ route('admin.show', $profile->mssv)}}" class="btn btn-primary">Show</a></td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection