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
                    <form action="{{ route('card.update',$card->id) }}" id="cardEditForm" method="post">
                        @csrf
                        @method('put')
                    </form>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" form="cardEditForm" name="title" class="form-control" value="{{ old('title',$card->title) }}">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" form="cardEditForm" name="category" class="form-control" value="{{ old('title',$card->category) }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" form="cardEditForm"
                                    name="description"
                                    rows="15"
                                    class="form-control">

                                    {{ old('description',$card->description) }}
                            </textarea>
                        </div>


                        <div class="d-flex justify-content-end ">
                            <a href="{{ route('card.index') }}" class="btn btn-outline-secondary me-3">Back</a>

                            <form action="{{ route('card.destroy',$card->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger me-3">
                                    Delete
                                </button>
                            </form>


                            <button form="cardEditForm" class="btn btn-outline-success">Update Card</button>
                        </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection



