<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand font-weight-light font-italic text-uppercase text-info" href="{{ url('/') }}">
            {{ config('app.name', 'Financegram') }} <i class="fas fa-ellipsis-v"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-light lead" href="{{ route('blog.index') }}">
                        <i class="fas fa-rss"></i> Articole
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link font-weight-light lead text-info" href="{{ route('login') }}">
                        <i class="fas fa-user-alt"></i> Autentificare
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-light lead text-info" href="{{ route('register') }}">
                        <i class="fas fa-sign-in-alt"></i> Inregistrare
                    </a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-light lead text-info" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.index') }}">
                            Articolele Mele
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                            
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-light lead text-info" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if(Auth::user()->unreadNotifications->count())
                        <span class="badge badge-danger ml-2">{{Auth::user()->unreadNotifications->count()}}</span>
                        @endif
                        <i class="fas fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-info initialism" href="{{ route('markAllRead') }}">Marcheaza ca Citite</a>
                        @foreach (Auth::user()->unreadNotifications as $notification)
                        <a class="dropdown-item" href="{{ route('markRead', ['notification_id' => $notification->id]) }}">
                            <b>{{$notification->data['user_name']}}</b> a postat.
                        </a>
                        @endforeach
                        @foreach (Auth::user()->readNotifications as $notification)
                        <a class="dropdown-item text-secondary" href="{{ route('blog.post', ['id' => $notification->data['post_id']]) }}">
                            {{$notification->data['user_name']}} a postat.
                        </a>
                        @endforeach
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>