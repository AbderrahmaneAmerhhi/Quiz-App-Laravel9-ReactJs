@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Categories
@endsection

@section('content')
 <div class="container">
    <div class="row mx-auto">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h3> Edit Category {{$cate->title}}</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('cats.update',$cate->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="category title" value="{{$cate->title}}" >
                    </div>
                    <div class="mb-3">
                      <label for="Description" class="form-label">Description</label>
                      <textarea name="description" id="Description" cols="30" rows="10"  class="form-control" placeholder="Category description">{{$cate->description}}</textarea>
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
