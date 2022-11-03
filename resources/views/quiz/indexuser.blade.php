@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Quizes
@endsection

@section('content')

<div id="Quizes">
</div>
@endsection

@section('script')
        {{-- reactjs scrips  --}}
        @viteReactRefresh
        @vite('resources/js/app.js')
@endsection
