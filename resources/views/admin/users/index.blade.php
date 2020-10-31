@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    @if ( $user->roles()->get()->pluck('name')->toArray() !== ["admin"])
                                    <td>{{ $user->email }}</td>
                                    @foreach($profiles as $profile)
                                        @if($profile->email === $user->email)
                                            <td>{{$profile->name}}</td>
                                            <td><a href="{{ route('admin.users.show', $profile->mssv)}}" type="button" class="btn btn-primary">Show</a></td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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
@endsection
