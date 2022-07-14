@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row vh-100">
        <!--Sidebar start-->
        @include('layouts.sidebar')
        <!--sidebar end -->
        <!--content start -->
       @yield('card')
    </div>
</div>
@endsection
