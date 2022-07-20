@extends('home')
@section('card')
<div class="col-lg-10 content-bg">
    <div class="p-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('card.index') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Card Detail</li>
            </ol>
        </nav>

        <div class="container">
            <div class="row my-3">

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif


                       <!--card start-->
                <div class="col-lg-8 my-3 ">
                    <div class="card p-4 pb-0">
                        <div class="card-head">
                            <div class="d-flex justify-content-between">
                                <input type="checkbox" class="square">
                                <div class="active-dot"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h1 class="fw-bold h4 text-success">
                                {{ $card->title }}
                            </h1>
                            <span class="badge bg-secondary">{{ $card->category }}</span>

                            <p class="text-black-50 my-2">
                                {{ $card->description }}
                            </p>
                            <div class="mb-3 ">
                                <p class=" mb-0 text-success fw-bold">
                                    {{ $card->user->name }}
                                </p>
                                <p class="text-black-50 mb-0">
                                    {{ $card->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div class="card-line my-2"></div>
                            <div class="d-flex justify-content-center ">
                                <div class="mx-auto border-right">
                                    <i class="bi bi-eye-fill"></i>
                                    3
                                </div>
                                <div class="middle-break mx-2"></div>
                                <div class="mx-auto">
                                    <i class="bi bi-messenger"></i>
                                    10
                                </div>
                            </div>
                            <div class="card-line my-2"></div>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{ route('card.index') }}" class="rounded-pill px-4 btn btn-outline-secondary me-2">All Card</a>
                                <a href="{{ route('card.edit',$card->id) }}" class="rounded-pill px-4 btn btn-outline-success">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--card end-->

                <div class="col-lg-4 my-3">
                    <div class="card p-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h2 class="fw-bold">Ads</h2>
                                <button id="closeBtn" class="btn btn-sm rounded-circle">
                                    <i class="bi bi-x fs-4"></i>
                                </button>
                            </div>
                            <img src="{{ asset('image/ads.jpg') }}" id="adsImage" height="500" class="w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



