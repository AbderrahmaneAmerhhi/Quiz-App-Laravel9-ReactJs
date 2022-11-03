

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','defualt ')</title>
    @if (auth()->guard('web')->check())
    <meta name="UserRole" content="{{auth()->user()->role}}"/>
    @elseif(auth()->guard('admin')->check())
    <meta name="UserRole" content="admin"/>
    @endif
    <meta name="userid" content="{{auth()->user()->id}}"/>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- bx icons cdn  --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- bootsrap5 v2 cdn  --}}
    <link href=' https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet'>

    {{-- jquery data table cdn css  --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    @yield('style')
</head>
<body>
    <header  class="top-nav " id="top-nav">
       <div class="dropdown language-drpdwn">
        <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
         @if (App::getLocale() == 'en')
         <img src="{{asset('images/flags/united-kingdom.png')}}" alt="eng lg" class="flag-img">
         @elseif(App::getLocale() == 'fr')
         <img src="{{asset('images/flags/france.png')}}" alt="eng lg" class="flag-img">
         @else
         <img src="{{asset('images/flags/saudi-arabia.png')}}" alt="eng lg" class="flag-img">
         @endif

        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="{{route('change.lg','ar')}}"> <img src="{{asset('images/flags/saudi-arabia.png')}}" alt="saudi-arabia lg" class="flag-img"></a></li>
          <li><a class="dropdown-item" href="{{route('change.lg','en')}}"> <img src="{{asset('images/flags/united-kingdom.png')}}" alt="saudi-arabia lg" class="flag-img"></a></li>
          <li><a class="dropdown-item" href="{{route('change.lg','fr')}}"> <img src="{{asset('images/flags/france.png')}}" alt="france lg" class="flag-img"></a></li>
        </ul>
      </div>

    </header>
    <div class="i-navbar " id="navbar">
        <nav class="nav mb-5">
            <div>
                @if (Auth::guard('web')->check())
                    <a href="{{route('users.show',auth()->user()->id)}}" class="nav__logo" style="text-decoration: none">
                        <img src="{{asset('images/logos/quizlogo.png')}}" alt="" class="nav__logo-icon">

                        <span class="nav__logo-text">{{auth()->user()->name}}</span>
                    </a>
                @else
                    <a href="#" class="nav__logo" style="text-decoration: none">
                        <img src="{{asset('images/logos/quizlogo.png')}}" alt="" class="nav__logo-icon">

                        <span class="nav__logo-text">{{__('indexlg.logotxt')}} </span>
                    </a>
                @endif


                <div class="nav__toggle" id="nav-toggle">
                      <i class="bx bxs-chevron-right"></i>
                </div>

                <ul class="nav__list">
                    @if (Auth::guard('admin')->check())
                    <a href="{{route('dash.index')}}" class="nav__link {{Route::currentRouteName() == 'generated::tadH0kiJ89EkGIMD' ? 'active' : ''}} ">
                        <i class='bx bx-home-alt-2 nav__icon' ></i>
                        <span class="nav__text">{{__('indexlg.home')}}</span>
                    </a>

                    <a href="{{route('users.index')}}" class="nav__link {{Route::currentRouteName() == 'users.index' ? 'active' : ''}} ">
                        <i class='bx bxs-user nav__icon'></i>
                        <span class="nav__text">{{__('indexlg.user')}}</span>
                    </a>
                    @endif
                    @if (auth()->user()->role  == 'teacher' || Auth::guard('admin')->check())


                    <a href="{{route('establishment.index')}}" class="nav__link {{Route::currentRouteName() == 'establishment.index' ? 'active' : ''}} ">
                        <i class='bx bxs-school nav__icon'></i>
                        <span class="nav__text">{{__('indexlg.etab')}}</span>
                    </a>
                    <a href="{{route('group.index')}}"href="/accnt/group" class="nav__link  {{Route::currentRouteName() == 'group.index' ? 'active' : ''}}">
                        <i class='bx bxs-graduation nav__icon'></i>
                        <span class="nav__text">{{__('indexlg.grp')}}</span>
                    </a>
                    <a href="{{route('cats.index')}}" class="nav__link  {{Route::currentRouteName() == 'cats.index' ? 'active' : ''}}">
                        <i class='bx bxs-grid-alt nav__icon' ></i>
                        <span class="nav__text">{{__('indexlg.qzcat')}}</span>
                    </a>

                    @endif

                    <a href="/quiz" class="nav__link {{url()->current() == 'http://127.0.0.1:8000/quiz' ? 'active' : ''}} ">
                        <i class='bx bx-book-content nav__icon'></i>
                        <span class="nav__text">{{__('indexlg.qz')}}</span>
                    </a>
                </ul>
            </div>
            <div>
                @if (Auth::guard('web')->check())
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button style="background: transparent;border:none;" type="submit" class="nav__link btn__link">
                    <i class="bx bx-log-out-circle nav__icon"></i>
                    <span class="nav__text">{{__('indexlg.logout')}}</span>
                </button>
                {{auth()->user()->role }}
            </form>
            @endif
            @if (Auth::guard('admin')->check())
            <form action="{{route('admin.logout')}}" method="post">
                @csrf
                <button style="background: transparent;border:none;" type="submit" class="nav__link btn__link">
                    <i class="bx bx-log-out-circle nav__icon"></i>
                    <span class="nav__text">Admin logout</span>
                </button>
            </form>
            @endif
            </div>

        </nav>
    </div>


    @yield('content')




    {{-- jquery 3 cdn  --}}
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>

    <script src="{{asset('js/script.js')}}"></script>
    {{-- bootsrap 5 v2 cdn js  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
     {{-- jquery datatable cdn js  --}}
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>



     @yield('script')
</body>
</html>
