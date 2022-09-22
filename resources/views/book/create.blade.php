@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row justify content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-reader">Create new Book</div>
                        <div class="card-body">

                            @include('components.error-form')

                            <form action="{{ route('book.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" value=""
                                            name="title" placeholder="title name">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="cover" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="cover" value=""
                                            name="cover" placeholder="cover name">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="year" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="year" value=""
                                            name="year" placeholder="year name">
                                    </div>

                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
