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
                            {{-- @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->profile->name }}</td>
                                    <td>{{ $user->profile->mssv }}</td>
                                    <td>{{ $user->profile->phone }}</td>
                                    <td>{{ $user->profile->class }}</td>

                                </tr>
                        
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
