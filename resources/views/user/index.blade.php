@extends('home')
@section('card')
<div class="col-lg-10 content-bg">
    <div class="p-5">

       <div class="">
            <h1 class="mb-2">User Table</h1>
            <div class="row justify-content-between">
                <div class="col-lg-8">
                    <table class="table">
                        <thead class="text-end">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody class="text-end text-a">
                            @forelse ($users as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <th>{{ $user->name }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th>{{ $user->role }}</th>
                                    <th class="">
                                        @can('delete', $user)
                                        <form action="{{ route('user.destroy',$user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm p-0  ">
                                                <i class="bi bi-trash3 fs-5 text-danger"></i>
                                            </button>
                                        </form>
                                        @endcan

                                    </th>
                                </tr>
                            @empty
                                No user yet
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3 ">
                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">Active Status</h3>
                            </div>
                            <div class="card-body">
                                @forelse ($users as $user)
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <p class="mb-0 fw-bold"> {{ $user->name }}</p>
                                            <p class="mb-0 text-black-50 small">{{ $user->role }}</p>
                                        </div>
                                        <div class="active-dot"></div>
                                    </div>
                                    <div class="card-line my-1"></div>
                                @empty
                                    <h1>No one is active</h1>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>


@endsection
