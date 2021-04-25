@extends('layout.default')
@section('title', 'Admin Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-3">
            <header>
                <!-- Navbar -->
                <nav class="navbar navbar-expand navbar-light bg-white fixed-top">
                    <div class="container-fluid">

                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" aria-current="page" href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.tables',['users']) }}">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.tables',['customers']) }}">Customers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.tables',['products']) }}">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.tables',['orders']) }}">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('auth.logout') }}">Logout as {{ $UserInfo['first_name'].' '.$UserInfo['last_name'] }}</a>
                                </li>
                            </ul>

                    </div>
                </nav>
                <!-- Navbar -->

                <!-- Jumbotron -->
                <div class="table-responsive bg-light text-center" style="margin-top: 58px;">
                    <table class="table table-bordered table-hover  text-center ">
                        <thead class="table-info">
                        <tr>
                            @foreach($columns  as $col_name => $value)
                                <th scope="col">{{ $value }}</th>
                            @endforeach
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($Result as $row)
                            <tr>
                                @foreach($columns  as $col_name => $value)
                                    <td>
                                        {{ $row[$value] }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <span>
                        {{ $Result->links() }}
                    </span>

                    <style>
                        .w-5 {
                            display: inline;
                            width: 1.5em;
                        }
                    </style>
                </div>
                <!-- Jumbotron -->
            </header>

        </div>
    </div>
</div>

@endsection
