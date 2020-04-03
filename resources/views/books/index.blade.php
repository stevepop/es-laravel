@extends('layouts.master')


@section('content')
<div class="container mx-auto">
    <div class="rounded p-4">
        <div class="bg-white rounded p-6 mb-6 flex justify-between">
            <div class="p-2">
                <span class="font-bold text-lg">Books</span> <small>({{ $books->total() }})</small>
            </div>
            <div class="p-4 w-64">
                <form action="{{ url('search') }}" method="get">
                    <div class="form-group">
                        <input type="text" name="q" class="border p-2 w-full" placeholder="Search..."
                            value="{{ request('q') }}" />
                    </div>
                </form>
            </div>
        </div>

        <div class="bg-white rounded p-6">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">ISBN</th>
                        <th class="px-4 py-2">Categories</th>
                        <th class="px-4 py-2">Published Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                    <tr>
                        <td class="border px-4 py-2">{{ $book->title }}</td>
                        <td class="border px-4 py-2">{{ $book->isbn }}</td>
                        <td class="border px-4 py-2">
                            @foreach($book->categories as $category)
                            <span
                                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                                {{ $category }}
                            </span>
                            @endforeach
                        </td>
                        <td class="border px-4 py-2">
                            {{ $book->published_date ? $book->published_date->format('d/m/Y') : null }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>No books found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="bg-white p-4 mt-6">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
@stop