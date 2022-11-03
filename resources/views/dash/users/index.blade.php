@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Users
@endsection

@section('content')
  <div class="container mt-5">
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Users

                    <a class="btn"href="{{route('users.create')}}">
                        <i class='bx bx-plus'></i>
                    </a>
                </div>
                <div class="mt-5 body-content " >
                     @include('layouts.alerts')
                    <table id="table_id" class="display ">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Group</th>

                                <th>Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email }}</td>
                                <td>{{$user->role }}</td>
                                <td>{{$user->groupe ? $user->groupe->title : "group not specify"}}</td>
                                <td class="d-flex justify-content-center align-items-center">

                                     <form id="{{$user->id}}" method="POST" action="{{route('users.destroy',$user->id)}}">
                                         @csrf
                                         @method('delete')
                                         <button type="button"

                                                 class="btn btn-danger"
                                                  onclick="event.preventDefault();
                                                        if( confirm('Confirm')){
                                                            document.getElementById('{{$user->id}}').submit();
                                                        }
                                                   "
                                                 >
                                            <i class='bx bxs-trash-alt'></i>
                                         </button>
                                     </form>
                                     <a  href="{{route('users.edit',$user->id)}}" class="btn btn-success">
                                        <i class='bx bxs-edit' ></i>
                                     </a>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>


                    </table>

                </div>
            </div>
        </div>

     </div>
  </div>
@endsection

@section('script')
<script>

$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection
