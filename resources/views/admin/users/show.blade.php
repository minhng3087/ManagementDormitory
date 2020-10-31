{{-- Show thong tin sinh vien --}}
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
                                <tr>
                                    <td>{{ $detail->email }}</td>
                                    <td>{{ $detail->name  }}</td>
                                    <td>{{ $detail->phone  }}</td>
                                    <td>{{ $detail->class  }}</td>
                                    <td>{{ $detail->mssv  }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
