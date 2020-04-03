<?php

namespace App;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use Searchable;
    
    protected $guarded = ['created_at', 'updated_at'];

     protected $casts = [
        'authors' => 'json',
        'categories' => 'json',
    ];

   protected $dates = ['published_date'];
}
