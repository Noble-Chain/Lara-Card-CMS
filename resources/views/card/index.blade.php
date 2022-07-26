@extends('home')
@section('card')
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
                <button type="button" id="createCard" class="btn btn-success rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#createModel">
                    <i class="bi bi-plus"></i>
                    Create Card
                </button>

            </div>
        </div>

                 <!-- Modal -->
        <form action="{{ route('card.store') }}" method="post">
            @csrf
            <div class="modal fade" id="createModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-lg">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModelLabel">Create title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text"
                                            class="form-control w-100 @error('title') is-invalid @enderror"
                                            name="title">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label ">Category</label>
                                    <input type="text"
                                            class="form-control w-100 @error('title') is-invalid @enderror"
                                            name="category">
                                    @error('category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text"
                                                class="form-control w-100 @error('title') is-invalid @enderror"
                                                rows="25"
                                                name="description"> </textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-success">Create Card</button>
                            </div>
                        </div>
                </div>
            </div>
        </form>


        <!-- Content minu nav start -->
        <ul class="nav mt-3 border-bottom">
            <li class="nav-item me-3">
              <a class="tab-spacing text-secondary ps-0 nav-link fs-6 text-uppercase active" aria-current="page" href="#">All cards</a>
            </li>
            <li class="nav-item me-3">
                <a class="tab-spacing text-secondary ps-0 nav-link fs-6 text-uppercase" href="#">
                   <div class="d-flex align-items-center ">
                        <div class="status-dot active-dot me-2"></div>
                        Active
                   </div>
                </a>
            </li>
            <li class="nav-item me-3">
                <a class="tab-spacing text-secondary ps-0 nav-link fs-6 text-uppercase" href="#">
                   <div class="d-flex align-items-center ">
                        <div class="status-dot inactive-dot me-2"></div>
                        Inactive
                   </div>
                </a>
            </li>

        </ul>
        <!-- Content minu nav end -->

        <div class="container">
            <div class="row my-3">

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif


                @forelse ($cards as $card)
                       <!--card start-->
                <div class="col-lg-3 my-3 ">
                    <div class="card p-4 pb-0">
                        <div class="card-head">
                            <div class="d-flex justify-content-between">
                                <input type="checkbox" class="square">
                                <div class="status-dot inactive-dot"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-bold h5 ">
                                {{ $card->title}}
                            </p>
                            <p class="h5 my-3 text-black-50 small">
                                {{ $card->excert}}
                            </p>
                            <div class="card-line my-2"></div>
                            <div class="d-flex justify-content-center ">
                                <div class="mx-auto">
                                   <a href="#" class="text-decoration-none text-black-50">
                                    <i class="bi bi-hand-thumbs-up-fill "></i>
                                    0
                                   </a>
                                </div>
                                <div class="middle-break mx-2"></div>
                                <div class="mx-auto">
                                    <a href="#" class="text-decoration-none text-black-50">
                                        <i class="bi bi-eye-fill "></i>
                                        0
                                    </a>
                                </div>
                            </div>
                            <div class="card-line my-2"></div>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{ route('card.show',$card->id) }}" class="rounded-pill px-4 btn btn-outline-secondary me-2">View</a>
                                @can('update',$card)
                                    <a href="{{ route('card.edit',$card->id) }}" class="rounded-pill px-4 btn btn-outline-success">
                                        Edit
                                    </a>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
                <!--card end-->
                @empty
                <div class="bg-success p-5 text-white">
                    <h1 class="mb-0 text-white mb-0">No Card Yet! Make Your Card Now</h1>
                </div>
                @endforelse



            </div>
        </div>


    </div>
</div>


@endsection
@if (session("status"))
<script>
    document.addEventListener("DOMContentLoaded",()=>{
        showToast("{{ session('status') }}")
    })
    </script>
@endif
