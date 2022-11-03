@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Groupes
@endsection

@section('content')
  <div class="container mt-5">
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Groupes

                    <a class="btn"href="{{route('group.create')}}">
                        <i class='bx bx-plus'></i>
                    </a>
                </div>
                <div class="mt-5 body-content " >
                     @include('layouts.alerts')
                    <table id="table_id" class="display ">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Title</th>
                                <th >Establishment</th>
                                <th>Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                            <tr>
                                <td>{{$group->id}}</td>
                                <td>{{$group->title}}</td>
                                <td>{{$group->establishment->name }}</td>
                                <td class="d-flex justify-content-center align-items-center">

                                     <form id="{{$group->id}}" method="POST" action="{{route('group.destroy',$group->id)}}">
                                         @csrf
                                         @method('delete')
                                         <button type="button"

                                                 class="btn btn-danger"
                                                  onclick="event.preventDefault();
                                                        if( confirm('Confirm')){
                                                            document.getElementById('{{$group->id}}').submit();
                                                        }
                                                   "
                                                 >
                                            <i class='bx bxs-trash-alt'></i>
                                         </button>
                                     </form>
                                     <a  href="{{route('group.edit',$group->id)}}" class="btn btn-success">
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
