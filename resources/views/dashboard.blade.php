@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container">
      @if(Auth::user()->hasRole('admin'))
      <h3 class="text-center">Bạn đang đăng nhập với tư cách admin</h3>
      @else
      <h3 class="text-center">Bạn đang đăng nhập với tư cách user</h3>
    </div>
    @endif
  </div>
@endsection

