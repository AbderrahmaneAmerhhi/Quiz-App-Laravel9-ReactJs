@extends('layouts.nav')

@section('style')

@endsection
@section('title')
     Index
@endsection

@section('content')
  <div id="Statstics" class="container "style="    margin-top: 50px;">
    {{-- test {{Route::currentRouteName()

        }}
        {{ Auth::guard('admin')->check() ? 'aa' :'aaaa'}} --}}
  </div>

@endsection

@section('script')
 {{-- reactjs scrips  --}}
 @viteReactRefresh
 @vite('resources/js/app.js')
@endsection
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
