@extends('layouts.app')

@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Clients
                        </a>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Reservations
                        </a>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                            Cars
                        </a>
                    </div>
                </div>
                {{--<div class="sb-sidenav-footer">--}}
                {{--    <div class="small">Logged in as:</div>--}}
                {{--    Start Bootstrap--}}
                {{--</div>--}}
            </nav>
        </div>
        <div id="layoutSidenav_content">

            @yield('dashboard-content')

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid text-center small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                </div>
            </footer>
        </div>
    </div>
@endsection
