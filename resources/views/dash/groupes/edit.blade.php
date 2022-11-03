@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Groupes
@endsection

@section('content')
 <div class="container">
    <div class="row mx-auto">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h3> Edit Groupe {{$group->title}}</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('group.update',$group->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="category title" value="{{$group->title}}" >
                    </div>
                    <div class="mb-3">
                        <label for="etb" class="form-label">Title</label>
                        <select  class="form-control" name="establishment_id" id="etb" >
                            @foreach ($etabls as $etabl)
                            <option value="{{$etabl->id}}" {{$group->establishment_id == $etabl->id ? 'selected' : ''}}>{{$etabl->name}}</option>
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
