@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row justify content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-reader">Form Edit Category</div>
                        <div class="card-body">

                            @include('components.error-form')

                            <form action="{{ route('category.update', ['category' => $category]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name"
                                            value="{{ $category->name }}" name="name" placeholder="category name">
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                    </div>
                                    </label>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
