<?php

namespace App\Console\Commands;

use App\Book;
use Elasticsearch\Client;
use Illuminate\Console\Command;

class IndexBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:es:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Index Books data into Elasticsearch';

   /** @var \Elasticsearch\Client */
    private $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        parent::__construct();

        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         $this->info('Indexing all books into Elasticsearch. Please wait....');

         foreach (Book::cursor() as $book) {
             $this->elasticsearch->index([
                'index' => $book->getSearchIndex(),
                'type' => $book->getSearchType(),
                'id' => $book->getKey(),
                'body' => $book->toSearchArray(),
            ]);

            // PHPUnit-style feedback
            $this->output->write('.');
         }

          $this->info("\nIndexing completed!");
    }
}
