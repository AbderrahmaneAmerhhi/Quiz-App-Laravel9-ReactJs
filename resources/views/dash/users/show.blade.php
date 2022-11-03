@extends('layouts.nav')

@section('style')
<style>

@import url('https://fonts.googleapis.com/css?family=Abel');

html, body {
  font-family: Abel, Arial, Verdana, sans-serif;
}

.additional{

    background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
    padding: 20px;
    border-radius: 20px;
  box-shadow: 0 8px 16px -8px rgba(0,0,0,0.4);
  height: 250px;
}
.general{
    background-color: #fff;
  background: linear-gradient(#f8f8f8, #fff);
  box-shadow: 0 8px 16px -8px rgba(0,0,0,0.4);
  border-radius: 20px;
  height: 250px;
  overflow: scroll
}
.general h1 {
  text-align: center;
}

</style>
@endsection
@section('title')
{{$user->name}}
@endsection

@section('content')

 <div class="container " style="    margin-top: 50px;">
    <div class="row mx-auto">
      <div class="col-md-12">

                <div class="profile-content">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="additional ">
                              <div class="user-cardd">
                                <div class="level center">
                                    <i class='bx bxs-school '></i>
                                     @if ($user->groupe)
                                      {{$user->groupe->establishment->name}}
                                      @else
                                      Etab not specify
                                     @endif
                                </div>


                              </div>
                              <div class="more-info">
                                <h1> {{$user->name}}</h1>
                                <div class="coords">
                                  <span  class="badge bg-danger" >
                                      @if ($user->groupe)
                                        Group :  {{$user->groupe->title}}
                                      @else
                                        Etab not specify
                                      @endif

                                  </span>
                                  <span class="badge bg-success">Created in :  {{ $user->created_at->format('d/m/Y')}}</span>
                                </div>
                                <div class="coords">
                                  <span class="badge bg-secondary">Role :{{$user->role}}</span>
                                  <span class="badge bg-secondary"> Adresse :{{$user->adress}}</span>
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="col-md-6 general">
                            <h1> {{$user->name}}</h1>

                            <p>
                                @if ($quizeres)
                                    @foreach ($quizeres as $item)
                                    <ul class="list-group">

                                        <li class="list-group-item"><span class="badge bg-danger"> Quiz title</span> : <span class="badge bg-info"> {{App\Models\Quiz::where('id',$item->quizze_id)->first()->title}} </span>, <span class="badge bg-light text-bg-info">Note</span> : <span class="badge bg-info"> {{$item->note}} </span> <span class="badge bg-success"> in </span> : <span class="badge bg-info"> {{ $item->created_at->format('d/m/Y')}} </span></li>
                                      </ul>

                                      @endforeach
                                @endif


                            </p>
                          </div>
                        </div>
   </div>
      </div>
    </div>
@endsection

@section('script')

@endsection
