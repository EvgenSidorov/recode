@extends('layout.area')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class=" justify-content-center">
            <h1>Форма {{ isset($book) ? 'редактирования' : 'добавления' }} книги</h1>
            @include('books.include.message')
        </div>
        <div class="w-75 mt-5">
            <form action="{{ route('app.saveBook', isset($book) ? ['book' => $book] : []) }}" class="mx-4" method="post">
                @csrf
                <div class="container w-75">
                    <div class="row">
                        <div class="mt-3">
                            <label for="exampleDataList" class="form-label">название</label>
                            <input class="form-control" name="title" value="{{ old('title', isset($book) ? $book->title : '') }}" id="exampleDataList">
                        </div>
                        <div class="mt-3">
                            <label for="exampleDataList" class="form-label">год издания</label>
                            <input class="form-control" name="year" value="{{ old('year', isset($book) ? $book->year : '') }}"
                                   id="exampleDataList">
                        </div>
                        <div class="mt-3">
                            <label for="exampleDataList" class="form-label">авторы</label>
                            <select name="authors[]" class="form-control" multiple>
                                <option value=""></option>
                                                @foreach($authors as $id => $author)
                                <option value="{{ $id }}">{{ $author }} </option>
                                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container d-flex mt-5 w-50">
                    <a href="{{ route('app.home') }}" class="btn btn-outline-dark">Вернуться</a>
                    <button type="submit" id="submitButton" class="btn btn-outline-primary mx-2">Добавить книгу
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
