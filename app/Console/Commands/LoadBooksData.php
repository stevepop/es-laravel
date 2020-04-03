<?php

namespace App\Console\Commands;

use App\Book;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LoadBooksData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load book data from json file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $json = json_decode(Storage::get('data/books.json'), true);

         $this->info('Loading books from json. This might take a while...');

        foreach ($json as $item) {
            $bookData = [
                'title' => $item['title'],
                'isbn' => $item['isbn'] ?? null,
                'page_count' => $item['pageCount'],
                'published_date' => isset($item['publishedDate']) ? $item['publishedDate']['$date'] : null,
                'thumbnail_url' => $item['thumbnailUrl'] ?? null,
                'short_description' => $item['shortDescription'] ?? null,
                'long_description' => $item['longDescription'] ?? null,
                'status' => $item['status'],
                'authors' => $item['authors'],
                'categories' => $item['categories'],
            ];

            Book::create($bookData);

             // PHPUnit-style feedback
            $this->output->write('.');
        }


         $this->info("\n Loading Complete!");
    }
}
