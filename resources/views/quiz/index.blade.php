@extends('layouts.nav')
@section('style')

@endsection
@section('title')
Quiz
@endsection

@section('content')

<div id="Quize">
</div>
@endsection

@section('script')
        {{-- reactjs scrips  --}}
        @viteReactRefresh
        @vite('resources/js/app.js')
@endsection
