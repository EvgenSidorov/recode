<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $authorId = request()->get('author');

        $books = Book::with('authors')
            ->when($authorId, function ($query) use ($authorId) {
                return $query->byAuthor($authorId);
            })
            ->orderBy('title')
            ->get();
        $authors = Author::all()->pluck('full_name', 'id');
        return view('books.index', [
            'title' => 'Главная',
            'books' => $books,
            'authors' => $authors,
        ]);
    }

    public function add()
    {
        $authors = Author::pluck('last_name', 'id');
        return view('books.add-book', [
            'title' => 'Добавить книгу',
            'authors' => $authors
        ]);
    }

    public function edit(Book $book)
    {
        $authors = Author::pluck('last_name', 'id');
        return view('books.add-book', [
            'title' => 'Редактировать книгу',
            'book' => $book,
            'authors' => $authors
        ]);
    }

    public function save(Book $book = null, Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:3',
            'year' => 'required|digits:4',
            'authors' => 'required|exists:authors,id',
        ]);

        $book = Book::saveBook($book, $request->toArray());

        if ($book->exists) {
            return redirect()->route('app.home');
        } else {
            return redirect()->route('app.addBook');
        }
    }

    public function delete(Book $book)
    {
        $book->delete();
        return redirect()->route('app.home');
    }
}
