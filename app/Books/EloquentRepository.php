<?php

namespace App\Books;
use App\Book;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentRepository implements BooksRepository
{
    public function search(string $query = ''): LengthAwarePaginator
    {
        return Book::query()
            ->where('short_description', 'like', "%{$query}%")
            ->orWhere('title', 'like', "%{$query}%")
            ->paginate();
    }
}
