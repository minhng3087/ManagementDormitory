@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit</div>

                <div class="card-body">
                    <form action="{{ route('user.profile.update', $profile)}}" method="POST">
                        @csrf
                        @method('PUT')
                        Class:
                        <input type="text" name="class" value="{{ $profile->class }}">
                        Phone:
                        <input type="number" name="phone" value="{{ $profile->phone }}">
                        MSSV
                        <input type="number" name="mssv" value="{{ $profile->mssv }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
