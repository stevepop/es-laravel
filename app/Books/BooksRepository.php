<?php

namespace App\Books;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface BooksRepository {
    public function search (string $query = ''): Collection;
}
