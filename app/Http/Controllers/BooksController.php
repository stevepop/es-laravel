<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Books\BooksRepository;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class BooksController extends Controller
{
    public function index()
    {
        $books = Book::paginate();

        return view('books.index', compact('books'));
    }

    function search(BooksRepository $repository)
    {
        $results = $repository->search((string) request('q'));

        $books = $this->paginate($results);

        return view('books.index', [
            'books' => $books
        ]);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}


