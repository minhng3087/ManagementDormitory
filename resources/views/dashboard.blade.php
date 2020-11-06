@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    @if(Auth::user()->hasRole('admin'))
    <p>Bạn đang đăng nhập với tư cách admin</p>
    @else
    <p>Bạn đang đăng nhập với tư cách user</p>
    @endif
  </div>
@endsection

