@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row justify content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-reader">Management Book</div>

                        @include('components.alert')
                        <div class="card-body">
                            <div class="pb-2">
                                <a href="{{ route('book.create') }}" class="btn btn-dark"> Create new Book</a>
                            </div>
                            <table class="table">
                                <thead class="table-dark text-center">
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Cover</th>
                                    <th>Year</th>
                                    <th>Category</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>

                                </thead>

                                <tbody>

                                    @forelse ($books as $key=>$book)
                                        <tr>
                                            {{--  --}}
                                            <td>{{ $books->firstItem() + $key }} </td>
                                            <td>{{ $book->title }} </td>
                                            {{-- <td>{{ $book->cover }} </td> --}}
                                            <td>
                                                @if (str_contains($book->cover, 'http'))
                                                    <img src="{{ $book->cover }}" alt="{{ $book->title }}" width="100">
                                                @else
                                                    <img src="{{ asset('storage/' . $book->cover) }}"
                                                        alt="{{ $book->title }}" width="100">
                                                @endif
                                            </td>
                                            <td>{{ $book->year }} </td>
                                            <td>
                                                <ul>
                                                    @forelse ($book->categories as $category)
                                                        <li>{{ $category->name }}</li>
                                                    @empty
                                                        -
                                                    @endforelse
                                                </ul>
                                            </td>
                                            <td>{{ $book->createdBy->name }} </td>
                                            <td>{{ $book->updatedBy->name }} </td>
                                            <td>{{ $book->created_at }} </td>
                                            <td>{{ $book->updated_at }} </td>
                                            <td class="justify-content-between">
                                                <a href="{{ route('book.edit', ['book' => $book]) }}"
                                                    class="btn btn-primary">Edit</a>

                                                @component('components.delete-button')
                                                    @slot('action')
                                                        {{ route('book.destroy', ['book' => $book->id]) }}
                                                    @endslot
                                                @endcomponent

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Book is empty</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $books->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
