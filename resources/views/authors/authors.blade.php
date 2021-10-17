@extends('layout.area')
@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Авторы</h1>
    </div>

    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Автор</th>
                <th scope="col">Количество книг</th>
                <th scope="col">Редактировать</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{ $author->id }}</th>
                    <td>{{ $author->full_Name }}</td>
                    <td>{{ $author->books->count() }}</td>
                    <td class="w-25">
                        <a href="{{ route('app.editAuthor', ['author' => $author]) }}" class="btn btn-outline-dark">Редактировать</a>
                        <a href="{{ route('app.deleteAuthor', ['author' => $author]) }}" class="btn btn-outline-danger">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row d-flex">
            <div class="col-2">
                <a href="{{ route('app.addAuthor') }}" class="btn btn-outline-primary">Добавить</a>
            </div>
        </div>

@endsection
