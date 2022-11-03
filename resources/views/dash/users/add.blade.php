@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Users
@endsection

@section('content')
 <div class="container mt-5">
    <div class="row mx-auto">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h3> Add New User</h3>
            </div>
            <div class="card-body">
                @include('layouts.alerts')
                <form method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="User Name" >
                    </div>
                    <div class="mb-3">
                        <label for="addresse" class="form-label">Addresse</label>
                        <input type="text" class="form-control" name="adress" id="addresse" placeholder="User Name" >
                      </div>
                    <div class="mb-3">
                      <label for="Email" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="Email" placeholder="User Email" >
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="User Password" >
                      </div>

                      <div class="mb-3">
                        <label for="Role" class="form-label">Role</label>
                        <select name="role" id="Role" class="form-control">
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="Groupe" class="form-label">Groupe</label>
                        <select name="group_id" id="Groupe" class="form-control">
                            <option  disabled selected>Select Group</option>

                            @foreach ($groupes as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
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
