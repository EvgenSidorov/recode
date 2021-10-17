<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::with('books')
            ->orderBy('last_name')
            ->get();
        return view('authors.authors', [
            'title' => 'Авторы',
            'authors' => $authors
        ]);
    }

    public function add()
    {
        return view('authors.add-author', [
            'title' => 'Добавить автора',
        ]);
    }

    public function edit(Author $author)
    {
        return view('authors.add-author', [
            'title' => 'Редактировать автора',
            'author' => $author
        ]);
    }

    public function save(Author $author = null, Request $request)
    {
        $this->validate($request, [
            'last_name' => 'required|min:3',
            'first_name' => 'required|min:3',
            'second_name' => 'required|min:3',
        ]);

        $author = Author::saveAuthor($author, $request->toArray());

        if ($author->exists) {
            return redirect()->route('app.authors');
        } else {
            return redirect()->route('app.addAuthor');
        }
    }

    public function delete(Author $author)
    {
        $author->delete();
        return redirect()->route('app.authors');
    }


}
