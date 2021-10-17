@extends('layout.area')
@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Библиотека</h1>
    </div>

    <div class="container">
        <div class="offset-2 col-md-2 m-5">
            <form action="{{ route('app.home') }}" name="filter" method="GET">
                <label><b>Выбрать автора:</b></label>
                <select name="author" class="form-control">
                    <option value=""></option>
                    @foreach($authors as $id => $author)
                        <option
                            {{ request()->get('author') == $id ? 'selected' : '' }} value="{{ $id }}">{{ $author }} </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-primary mt-2">Применить
                </button>
            </form>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Автор(ы)</th>
                <th scope="col">Год издания</th>
                <th scope="col">Редактировать</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->title }}</td>
                    <td>{!! $book->authors->pluck('full_name')->implode('<br>') !!}</td>
                    <td>{{ $book->year }}</td>
                    <td class="w-25">
                        <a href="{{ route('app.editBook', ['book' => $book]) }}" class="btn btn-outline-dark">Редактировать</a>
                        <a href="{{ route('app.deleteBook', ['book' => $book]) }}" class="btn btn-outline-danger">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row d-flex">
            <div class="col-2">
                <a href="{{ route('app.addBook') }}" class="btn btn-outline-primary">Добавить</a>
            </div>
        </div>

@endsection
