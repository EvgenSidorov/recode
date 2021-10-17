<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index')->name('app.home');
Route::get('/authors', 'AuthorController@index')->name('app.authors');
Route::get('/add-book', 'BookController@add')->name('app.addBook');
Route::get('/books', 'BookController@index')->name('app.books');
Route::post('/save-book/{book?}', 'BookController@save')->name('app.saveBook');
Route::get('/add-author', 'AuthorController@add')->name('app.addAuthor');
Route::get('/edit-author/{author}', 'AuthorController@edit')->name('app.editAuthor');
Route::get('/edit-book/{book}', 'BookController@edit')->name('app.editBook');
Route::get('/delete-author/{author}', 'AuthorController@delete')->name('app.deleteAuthor');
Route::get('/delete-book/{book}', 'BookController@delete')->name('app.deleteBook');
Route::post('/save-author/{author?}', 'AuthorController@save')->name('app.saveAuthor');

