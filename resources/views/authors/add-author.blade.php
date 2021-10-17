@extends('layout.area')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class=" justify-content-center">
            <h1>Форма {{ isset($author) ? 'редактирования': 'добавления' }} автора</h1>
            @include('books.include.message')
        </div>
        <div class="d-flex mt-5">
            <form action="{{ route('app.saveAuthor', isset($author) ? ['author' => $author] : []) }}" class="mx-4"
                  method="post">
                @csrf
                <div class="container ">
                    <div class="row">
                        <div class="mt-3">
                            <label for="exampleDataList" class="form-label">фамилия</label>
                            <input class="form-control" name="last_name"
                                   value="{{ old('last_name', isset($author) ? $author->last_name : '')  }}"
                                   id="exampleDataList">
                        </div>
                        <div class="mt-3">
                            <label for="exampleDataList" class="form-label">имя</label>
                            <input class="form-control" name="first_name"
                                   value="{{ old('first_name', isset($author) ? $author->first_name : '') }}"
                                   id="exampleDataList">
                        </div>
                        <div class="mt-3">
                            <label for="exampleDataList" class="form-label">отчество</label>
                            <input class="form-control" name="second_name"
                                   value="{{ old('second_name', isset($author) ? $author->second_name : '') }}"
                                   id="exampleDataList">
                        </div>
                    </div>
                </div>
                <div class="container d-flex mt-5 w-50">
                    {{--            <a href="{{ route('app.home') }}" class="btn btn-outline-dark m-5"><-Back</a>--}}
                    <a href="{{ route('app.authors') }}" class="btn btn-outline-dark">Вернуться</a>
                    <button type="submit" id="submitButton" class="btn btn-outline-primary mx-2">Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
