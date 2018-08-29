

  <nav class="navbar navbar-expand-md navbar-inverse fixed-top" style="background-color:#3490dc !important; color:white !important;">
    <div class="container">
        <a class="navbar-brand" style=" color:white !important;" href="{{ url('/') }}">
            <!-- get app name from .env file -->
            <h2>{{ config('app.name', 'Laravel') }}</h2>
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
               
            <a class="p-2 text-dark" href="/homepage" style=" color:white !important;">Home</a>
            <a class="p-2 text-dark" href="/hotels" style=" color:white !important;">Hotels</a>
            @guest
              <!-- these links appear onlu if user logged in -->
            @else
            <a class="p-2 text-dark" href="/hotels/create" style=" color:white !important;">Add Hotel</a>
            <a class="p-2 text-dark" href="/reservations" style=" color:white !important;">Reservations</a>
            @endguest
            </ul>
            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" style=" color:white !important;" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
 
                @else
                    <li class="nav-item dropdown">
                        <a style=" color:white !important;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>