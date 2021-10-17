<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public static function saveBook(Book $book = null, $bookData)
    {
        if (!$book) {
            $book = new self();
        }

        $book->fill($bookData);
        $book->save();
        $book->authors()->sync($bookData['authors']);
        return $book;
    }

    public function scopeByAuthor($query, $id)
    {
        return $query->whereHas('authors', function ($query) use ($id) {
            return $query->where('id', $id);
        });
    }
}
