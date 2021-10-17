<!DOCTYPE html>
<html lang="en">
@include('layout.head')
<body>
@include('layout.navigation')
{{--@if(!request()->routeIs('app.home'))--}}
{{--    --}}{{--    <h1>{{ $title??'title' }}</h1>--}}
{{--@endif--}}
{{--@include('movies.include.messages')--}}
@yield('content')
@include('layout.footer')
</body>
</html>
