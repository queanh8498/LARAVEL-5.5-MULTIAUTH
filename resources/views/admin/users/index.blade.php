@extends('layouts.admin.master')

@section('content')
	<body class="">
    <div class="wrapper">
       @include('layouts.admin.sidenav')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
-                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo">Admin Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                   
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header card-header-dark text-white bg-dark text-center">
                            <h4 class="card-title ">USER TABLE</h4>
                            <p class="card-category">-- Bảng User --</p>
                        </div>

                        <div class="card-body table-responsive">
                            <table class="table" id="order-listing">
                                <thead class=" text-dark"> 
                                    <th>
                                        Tài khoản
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Registered
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        
                                    <tr>
                                        
                                        <td>
                                            {{ $user->username }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->created_at}}
                                        </td>
                                        <td class="text-primary">
                                           <a href="{{ route('admin.user.edit', $user->username) }}">
                                               <i class="fa fa-cog"></i>
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
            @include('layouts.admin.footer')
        </div>
    </div>
</body>
@endsection