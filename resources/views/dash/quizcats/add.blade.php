@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Categories
@endsection

@section('content')
 <div class="container mt-5">
    <div class="row mx-auto">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h3> Add Quiz Category</h3>
            </div>
            <div class="card-body">
                @include('layouts.alerts')
                <form method="POST" action="{{route('cats.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="category title" >
                    </div>
                    <div class="mb-3">
                      <label for="Description" class="form-label">Description</label>
                      <textarea name="description" id="Description" cols="30" rows="10"  class="form-control" placeholder="Category description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>

         </div>
      </div>
    </div>
 </div>
@endsection

@section('script')

@endsection
