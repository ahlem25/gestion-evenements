<x-laravel-ui-adminlte::adminlte-layout>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
{{--                            <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"--}}
{{--                                class="user-image img-circle elevation-2" alt="User Image">--}}
                            <img class="user-image img-circle elevation-2" src="https://cdn4.iconfinder.com/data/icons/avatars-21/512/avatar-circle-human-male-3-512.png" alt="User profile picture">

                            <span class="d-none d-md-inline">
                                @if (Auth::check())
                                    {{ Auth::user()->name }}
                                @else

                                @endif
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
{{--                                <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"--}}
{{--                                    class="img-circle elevation-2" alt="User Image">--}}
                                <img class="img-circle elevation-2" src="https://cdn4.iconfinder.com/data/icons/avatars-21/512/avatar-circle-human-male-3-512.png" alt="User profile picture">

                                <p>
                                    @if (Auth::check())
                                        {{ Auth::user()->name }}
                                    @else

                                    @endif
                                    <small>
                                        @if (Auth::check())
                                            Member since {{ Auth::user()->created_at->format('M. Y') }}
                                        @else

                                        @endif
                                    </small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2025 <a href="https://iteam-univ.tn/">Iteam University</a>.</strong> All rights
                reserved.
            </footer>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
