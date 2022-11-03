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
                <h3> Add Etablishmenet</h3>
            </div>
            <div class="card-body">
                @include('layouts.alerts')
                <form method="POST" action="{{route('establishment.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Establishment Name" >
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="address" class="form-control" name="adress" id="address" placeholder="Establishment Address" >
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
