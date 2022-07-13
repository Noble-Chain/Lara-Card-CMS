@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row vh-100">
        <!--Sidebar start-->
        @include('layouts.sidebar')
        <!--sidebar end -->
        <!--content start -->
        <div class="col-lg-10 content-bg">
            <div class="p-5">

                <div class="d-flex justify-content-between align-items-center g-1">
                    <div class="col-6">
                        <h3>Cards | 18 <small>PCS</small></h3>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-between w-25 ">
                        <small>Select All Cards</small>
                        <input type="checkbox">
                        <button class="btn btn-outline-secondary text-uppercase rounded-pill px-4">Export to PDF</button>
                    </div>
                    <div class="mx-3 break">  </div>
                    <div class="col-2">
                        <a href="#" class="btn btn-success rounded-pill px-4">
                            <i class="bi bi-plus"></i>
                            Create Card
                        </a>
                    </div>
                </div>

                <!-- Content minu nav start -->
                <ul class="nav mt-3 border-bottom">
                    <li class="nav-item me-3">
                      <a class="tab-spacing text-secondary ps-0 nav-link fs-6 text-uppercase active" aria-current="page" href="#">All cards</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="tab-spacing text-secondary ps-0 nav-link fs-6 text-uppercase" href="#">
                           <div class="d-flex align-items-center ">
                                <div class="active-dot me-2"></div>
                                Active
                           </div>
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="tab-spacing text-secondary ps-0 nav-link fs-6 text-uppercase" href="#">
                           <div class="d-flex align-items-center ">
                                <div class="inactive-dot me-2"></div>
                                Inactive
                           </div>
                        </a>
                    </li>

                </ul>
                <!-- Content minu nav end -->

                <!--card start -->
                @include('card.index')

                <!--Card end -->


            </div>
        </div>
    </div>
</div>
@endsection
