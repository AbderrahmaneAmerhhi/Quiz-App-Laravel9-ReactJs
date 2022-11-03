@extends('layouts.nav')

@section('style')

@endsection
@section('title')
establishment
@endsection

@section('content')
 <div class="container">
    <div class="row mx-auto">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h3> Edit establishment {{$establishment->name}}</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('establishment.update',$establishment->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Establishment name" value="{{$establishment->name}}" >
                    </div>
                    <div class="mb-3">
                      <label for="Address" class="form-label">Address</label>
                      <input type="address" class="form-control" name="adress" id="address" placeholder="Establishment Address" value="{{$establishment->adress}}" >
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
