@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row justify content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-reader">List Category</div>


                        <div class="card-body">
                            @include('components.alert')
                            @can('create-category')
                                <div class="pb-2">
                                    <a href="{{ route('category.create') }}" class="btn btn-dark"> Create new Category</a>
                                </div>
                            @endcan

                            <table class="table">
                                <thead class="table-dark">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    @can(['edit-category', 'delete-category'])
                                        <th>Action</th>
                                    @endcan

                                </thead>

                                <tbody>

                                    @forelse ($categories as $key=>$category)
                                        <tr>
                                            {{--  --}}
                                            <td>{{ $categories->firstItem() + $key }} </td>
                                            <td>{{ $category->name }} </td>
                                            <td>{{ $category->created_at }} </td>
                                            <td>{{ $category->updated_at }} </td>

                                            @can(['edit-category', 'delete-category'])
                                                <td class="justify-content-between">
                                                    <a href="{{ route('category.edit', ['category' => $category]) }}"
                                                        class="btn btn-primary">Edit</a>

                                                    @component('components.delete-button')
                                                        @slot('action')
                                                            {{ route('category.delete', ['category' => $category->id]) }}
                                                        @endslot
                                                    @endcomponent

                                                </td>
                                            @endcan
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Category is empty</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
