@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Groupes
@endsection

@section('content')
 <div class="container mt-5">
    <div class="row mx-auto">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h3> Add Groupe</h3>
            </div>
            <div class="card-body">
                @include('layouts.alerts')
                <form method="POST" action="{{route('group.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Group title" >
                    </div>
                    <div class="mb-3">
                        <label for="etb" class="form-label">Title</label>
                        <select  class="form-control" name="establishment_id" id="etb" >
                            <option selected>Select the institution </option>
                            @foreach ($etabls as $etabl)
                            <option value="{{$etabl->id}}">{{$etabl->name}}</option>
                            @endforeach

                        </select>
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
