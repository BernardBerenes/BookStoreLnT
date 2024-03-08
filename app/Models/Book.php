<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'publisher',
        'synopsis',
        'isbn',
        'release_date',
        'page',
        'stocks'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author(){
        return $this->belongsToMany(Author::class, 'book_authors');
    }
}
