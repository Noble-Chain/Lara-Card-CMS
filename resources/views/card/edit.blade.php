@extends('home')
@section('card')
<div class="col-lg-10 content-bg">
    <div class="p-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('card.index') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Card</li>
            </ol>
        </nav>

        <div class="container">
            <div class="row my-3">

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="col-lg-10">
                    <form action="{{ route('card.update',$card->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title',$card->title) }}">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" value="{{ old('title',$card->category) }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text"
                                    name="description"
                                    rows="15"
                                    class="form-control">

                                    {{ old('description',$card->description) }}
                            </textarea>
                        </div>
                        <div class="">
                            <button class="btn btn-outline-success float-end">Update Card</button>
                        </div>
                   </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection



