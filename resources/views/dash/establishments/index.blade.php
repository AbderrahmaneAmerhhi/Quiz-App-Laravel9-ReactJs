@extends('layouts.nav')

@section('style')

@endsection
@section('title')
Etablishments
@endsection

@section('content')
  <div class="container mt-5">
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Etablishments

                    <a class="btn"href="{{route('establishment.create')}}">
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
                                <th class=" text-center">adress</th>
                                <th>Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($establishments as $establishment)
                            <tr>
                                <td>{{$establishment->id}}</td>
                                <td>{{$establishment->name}}</td>
                                <td>{{$establishment->adress}}</td>
                                <td class="d-flex justify-content-center align-items-center">

                                     <form id="{{$establishment->id}}" method="POST" action="{{route('establishment.destroy',$establishment->id)}}">
                                         @csrf
                                         @method('delete')
                                         <button type="button"

                                                 class="btn btn-danger"
                                                  onclick="event.preventDefault();
                                                        if( confirm('Confirm')){
                                                            document.getElementById('{{$establishment->id}}').submit();
                                                        }
                                                   "
                                                 >
                                            <i class='bx bxs-trash-alt'></i>
                                         </button>
                                     </form>
                                     <a  href="{{route('establishment.edit',$establishment->id)}}" class="btn btn-success">
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
