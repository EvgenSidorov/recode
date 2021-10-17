<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'second_name',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors');
    }

    public static function saveAuthor(Author $author = null, $authorData)
    {
        if (!$author) {
            $author = new self();
        }

        $author->fill($authorData);
        $author->save();
        return $author;
    }

    public function getFullNameAttribute()
    {
        return implode(' ', [$this->last_name, $this->first_name, $this->second_name]);
    }
}
