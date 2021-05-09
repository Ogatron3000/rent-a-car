@extends('layouts.app')

@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Navigation</div>
                        <a class="nav-link" href="{{ route('admin.reservations.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Reservations
                        </a>
                        <a class="nav-link" href="{{ route('admin.clients.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Clients
                        </a>
                        <a class="nav-link" href="{{ route('admin.cars.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                            Cars
                        </a>
                        <a class="nav-link" href="{{ route('admin.availability') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                            Availability
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            @yield('dashboard-content')

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid text-center small">
                    <div class="text-muted">Copyright &copy; Brm Brm Car 2021</div>
                </div>
            </footer>
        </div>
    </div>
@endsection
