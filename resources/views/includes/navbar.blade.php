<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                  
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Singgahki') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                   

                <form action="{{route('search')}}" class="navbar-form navbar-left" method="post">
                    {{csrf_field()}}                    
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                        </div>
                        <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="nav navbar-nav">
                        
                    </ul> --}}
                    <ul class="nav navbar-nav navbar-right">
                        &nbsp;
                        {{-- <li>  <a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/category/1') }}">Eat</a></li>
                        <li><a href="{{ url('/category/2') }}">Play</a></li>
                        <li><a href="{{ url('/category/3') }}">Relax</a></li>
                        <li><a href="{{ url('/category/4') }}">Trip</a></li> --}}

                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Menu <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{route('posts.create')}}">Create New Post</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('posts.index')}}">All Post</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('tags.create')}}">Create New Tag</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('tags.index')}}">All Tag</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('category.create')}}">Create New Category</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{route('category.index')}}">All Category</a></li>
                                    
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>